<?php

namespace App\Http\Controllers;

use App\Model\Cidade;
use App\Model\Endereco;
use App\Model\Estado;
use App\Model\Pagamento;
use App\Model\PessoaFisica;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PessoaFisicaController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($cpf)
    {
        $pf = PessoaFisica::find($cpf);
        $user = User::find($pf->user_iduser);
        $endereco = Endereco::find($pf->Endereco_idEndereco);
        $cidade = Cidade::find($endereco->Cidade_idCidade);
        $estado = Estado::find($cidade->Estado_idEstado);
        return array("pf_info"=>$pf, "user_info"=>$user, "endereco_info"=>$endereco, "cidade_info"=>$cidade, "estado_info"=>$estado);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPessoaSessao(){
        $p = PessoaFisica::where('user_iduser', Auth::user()->iduser)->get();
        return $p[0]->idpessoaFisica;

    }

    public function verificaEstadoCNH($estado){
        $t = ['resposta' => 'Estado '.$estado.' não existe!'];
        $est = Estado::where('nome', '=', $estado)->get();
        if (count($est)) {
            $t = ['resposta' => 'Estado '.$estado.' existe!'];
            return $t;
        }else{
            return $t;
        }
    }

    public function updateDados(Request $request, $cpf){
        $userFisico = PessoaFisica::find($cpf);
        $user = User::find($userFisico->user_iduser);
        $userFisico->sexo = $request->sexo;
        $userFisico->dataNascimento = $request->dataNascimento;
        $userFisico->rg = $request->rg;
        $user->name = $request->nome;
        $user->telefone = $request->telefone;
        $userFisico->save();
        $user->save();
        return redirect()->route('perfil');
    }

    public function setConta(Request $request){
        $conta = Pagamento::where('pessoaFisica_idpessoaFisica', '=', $this->getPessoaSessao());
        if($conta)
            return response('Já existe', 401);
        try{
           Pagamento::table('pagamento')->insert(array("nCartao"=>$request->cartao,"vcc"=>$request->vcc,"formaPagamento"=>$request->formapagamento,"dataValidade"=>$request->datav,"pessoaFisica_idpessoaFisica"=>$this->getPessoaSessao()));
           return response('conta inserida com sucesso', 200);
        }catch (\Exception $e){
            return response($e, 500);
        }
    }
}
