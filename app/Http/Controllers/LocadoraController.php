<?php

namespace App\Http\Controllers;

use App\Model\Acessorio;
use App\Model\Carros;
use App\Model\Classificacao;
use App\Model\Imagem;
use App\Model\Locadora;
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
            $tmp["imagens"] = Imagem::join('carros_has_imagens', function($q) use ($car) {
                                $q->on('carros_has_imagens.imagens_idimagens', '=', 'imagens.idimagens')
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
                                              "carro"         => $car->nome,
                                              "usuario"       => $request->user,
                                              "quantdias"     => $request->quantdias,
                                              "dataentrega"   => $request->dataentrega,
                                              "dataretirada"  => $request->dataretirada,
                                              "localentrega"  => $entrega,
                                              "localretirada" => $retirada]);
    }
    public function generatePDF(){
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
