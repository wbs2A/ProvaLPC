<?php

namespace App\Http\Controllers;

use App\Model\Acessorio;
use App\Model\Carros;
use App\Model\Classificacao;
use App\Model\FileEntry;
use App\Model\Imagem;
use App\Model\Locacao;
use App\Model\Locadora;
use App\Model\PessoaFisica;
use App\Model\PessoaJuridica;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Model\Endereco;
use App\Model\Cidade;
use App\Model\Estado;
use PDF;
use Illuminate\Http\Request;

class LocadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cnpj)
    {
        $data=$request->all();
        $data['id']=$cnpj;
        $locadora = Locadora::inserir($data);
        return redirect()->route('perfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locadora = Locadora::find($id);
        $endereco = Endereco::find($locadora->Endereco_idEndereco);
        $cidade = Cidade::find($endereco->Cidade_idCidade);
        $estado = Estado::find($cidade->Estado_idEstado);
        $locadora['rua']= $endereco->rua;
        $locadora['cep']= $endereco->cep;
        $locadora['bairro']= $endereco->bairro;
        $locadora['numero']= $endereco->numero;
        $locadora['cidade']= $cidade->nome;
        $locadora['estado']= $estado->nome;
        return $locadora;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idEndereco)
    {
        $data=$request->all();
        $data['id']=$id;
        $data['idEndereco']=$idEndereco;
        $locadora=Locadora::alterar($data);
        return redirect()->route('perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Locadora::where('idLocadora',$id)->delete();
        return redirect()->route('perfil');
    }

    public function getCars($id){
        $carros = Carros::where('locadora_idLocadora','=',$id)->get();
        $ret = array();
        $tmp = array();
        foreach ($carros as $car){
            $tmp["carro"]= $car;
            $tmp['classificacao'] = Classificacao::find($car->idClassificacao);
            $tmp["acessorios"] = Acessorio::join('carros_acessorio', function($q) use ($car) {
                                    $q->on('carros_acessorio.acessorio_idacessorio', '=', 'acessorio.idacessorio')
                                        ->where('carros_acessorio.carros_idcarro', '=', "$car->idcarro");
                                 })->get();
            $tmp["imagens"] = FileEntry::join('carros_has_imagens', function($q) use ($car) {
                                $q->on('carros_has_imagens.imagens_idimagens', '=', 'file_entries.id')
                                    ->where('carros_has_imagens.carros_idcarro', '=', "$car->idcarro");
                              })->get();
            array_push($ret,$tmp);
        }
        return $ret;
    }

    public function reserva(Request $request){
        $car = Carros::find($request->carro);
        $imagens = Imagem::join('carros_has_imagens', function($q) use ($car) {
            $q->on('carros_has_imagens.imagens_idimagens', '=', 'imagens.idimagens')
                ->where('carros_has_imagens.carros_idcarro', '=', "$car->idcarro");
        })->get();
        $retirada = Locadora::find($request->localentrega);
        $entrega = Locadora::find($request->localretirada);
        return redirect('reserva')->with(["imagens"       => $imagens,
                                              "carro"         => $car,
                                              "usuario"       => $request->user,
                                              "quantdias"     => $request->quantdias,
                                              "dataentrega"   => $request->dataentrega,
                                              "dataretirada"  => $request->dataretirada,
                                              "localentrega"  => $entrega,
                                              "localretirada" => $retirada]);
    }
    public function generatePDF(Request $request){
        $car = Carros::find($request->carroid);
        $user = Auth::user();

        $acessorios = Acessorio::join('carros_acessorio', function($q) use ($car) {
            $q->on('carros_acessorio.acessorio_idacessorio', '=', 'acessorio.idacessorio')
                ->where('carros_acessorio.carros_idcarro', '=', "$car->idcarro");
        })->get();

        $locadoraRet = Locadora::find($request->locadoraretid);
        $pjRet = PessoaJuridica::find($locadoraRet->pessoaJuridica_idPJ);
        $userpjret = User::find($pjRet->user_iduser);

        $locadoraEnt = Locadora::find($request->locadoraentid);
        $pjEnt = PessoaJuridica::find($locadoraEnt->pessoaJuridica_idPJ);
        $userpjent = User::find($pjEnt->user_iduser);

        $enderecoRet = Endereco::find($locadoraRet->Endereco_idEndereco);
        $cidadeRet = Cidade::find($enderecoRet->Cidade_idCidade);

        $enderecoEnt = Endereco::find($locadoraEnt->Endereco_idEndereco);
        $cidadeEnt = Cidade::find($enderecoEnt->Cidade_idCidade);

        $data = ['empresa' => 'LocadoraDAHORA',
                 'codigoConfirmacao'=> Hash::make($request->cpf.Carbon::now()),
                 'codigoSolicitacao'=> Hash::make($user->iduser.Carbon::now().$request->dias),
                 'classificacao'=> Classificacao::find($car->idClassificacao),
                 'acessorios'=>$acessorios,
                 'carro'=> $car,
                 'dias'=>$request->dias,
                 'valorCarro'=>$car->valor,
                 'nome'=>$user->name,
                 'telefone'=>$user->telefone,
                 'email'=>$user->email,
                 'dataRet'=>$request->dataret,
                 'localRet'=>$locadoraRet->nome,
                 'enderecoRet'=>"Rua: ".$enderecoRet->rua.", Numero: ".$enderecoRet->numero.", Bairro: ".$enderecoRet->bairro.", CEP: ".$enderecoRet->cep.". Cidade: ".$cidadeRet->nome,
                 'telefoneRet'=>$userpjret->telefone,
                 'dataDev'=>$request->dataent,
                 'localDev'=>$locadoraEnt->nome,
                 'enderecoDev'=>"Rua: ".$enderecoEnt->rua.", Numero: ".$enderecoEnt->numero.", Bairro: ".$enderecoEnt->bairro.", CEP: ".$enderecoEnt->cep.". Cidade: ".$cidadeEnt->nome,
                 'telefoneDev'=>$userpjent->telefone
        ];
        DB::table('carros')->where('idcarro','=',$request->carroid)->update(['locado'=>1]);
        DB::table('locacao')->insert(array('carros_idcarro'=>$request->carroid,'idLocadora'=>$locadoraRet->idLocadora, 'idpessoaFisica'=>$request->cpf, 'dataEntrega'=>Carbon::parse($request->dataent), 'localEntrega'=>$locadoraEnt->idLocadora, 'valorTotal'=>$car->valor*$request->dias));

        $pdf = PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('myPDF', $data);

        return $pdf->download('voucher.pdf');
    }

    public function getReservas(){
        if (Auth::user()){
            $pessoa = PessoaFisica::where('user_iduser','=',Auth::user()->iduser)->get();
            $ret = DB::table('locacao')->where('idpessoaFisica',$pessoa[0]->idpessoaFisica)->get();
            $retorno = array();
            $tmp = array();
            foreach ($ret as $v){
                $tmp["carro"]=Carros::find($v->carros_idcarro);
                $tmp["retiradoEm"]=Locadora::find($v->idLocadora);
                $tmp["entregueEm"]=Locadora::find($v->localEntrega);
                $tmp["valorTotal"]=$v->valorTotal;
                $tmp["dataEntrega"]=$v->dataEntrega;
                array_push($retorno,$tmp);
            }
            return $retorno;

        }else{
            return null;
        }
    }

    public function getClassificacaoAcess(){
        return array("classificacao"=>Classificacao::all(), "acessorios"=>Acessorio::all());
    }

    public function insertCarro(Request $request){
        $i=0;
        $id = DB::table('carros')->insertGetId(array("placa"=>$request->placa, "locadora_idLocadora"=>$request->locadoraid, "nome"=>$request->nome, "modelo"=>$request->modelo, "consumo"=>$request->consumo, "marca"=>$request->marca, "direcao"=>$request->direcao, "cambio"=>$request->cambio, "passageiros"=>$request->passageiros, "idClassificacao"=>$request->classificacao));
        foreach ($request->acessorios as $item) {
            DB::table('carros_acessorio')->insert(array("carros_idcarro"=>$id, "acessorio_idacessorio"=>$item));
        }
        return view('perfil');
    }

    public function deleteCarro($id){
        if($id){
            $res = Carros::where('idcarro',$id)->delete();
            if($res){
                return response("Excluído com sucesso", 200);
            }
        }
        return response('o ID deve ser inserido', 404);
    }

    public function updateCarro(Request $request, $id){
        if($id){
            DB::table('carros')->update(array("placa"=>$request->placa, "valor"=>$request->valor, "nome"=>$request->nome, "modelo"=>$request->modelo, "consumo"=>$request->consumo, "marca"=>$request->marca, "direcao"=>$request->direcao, "cambio"=>$request->cambio, "passageiros"=>$request->passageiros, "idClassificacao"=>$request->classificacao));
            foreach ($request->acessorios as $item) {
                $has = DB::table('carros_acessorio')->where('carros_idcarro','=',$id)->where('acessorio_idacessorio','=',$item)->count();
                if (!$has){
                    DB::table('carros_acessorio')->insert(array("carros_idcarro"=>$id, "acessorio_idacessorio"=>$item));
                }
            }
            return view('perfil');
        }
    }
}
