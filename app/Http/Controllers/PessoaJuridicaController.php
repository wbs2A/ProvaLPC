<?php

namespace App\Http\Controllers;

use App\Model\Cidade;
use App\Model\Endereco;
use App\Model\Estado;
use App\Model\Locadora;
use App\Model\PessoaJuridica;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PessoaJuridicaController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function show($cnpj)
    {
        $pf = PessoaJuridica::find($cnpj);
        $user = User::find($pf->user_iduser);
        $endereco = Endereco::find($pf->Endereco_idEndereco);
        $cidade = Cidade::find($endereco->Cidade_idCidade);
        $estado = Estado::find($cidade->Estado_idEstado);
        $locadoras = Locadora::where('pessoaJuridica_idPJ','=',$cnpj)->get();
        return array("p_info"=>$pf, "user_info"=>$user, "endereco_info"=>$endereco, "cidade_info"=>$cidade, "estado_info"=>$estado, "locadoras"=>$locadoras);
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
        $p = PessoaJuridica::where('user_iduser', Auth::user()->iduser)->get();
        return $p[0]->idPJ;
    }
    public function updateDados(Request $request, $cnpj){
        $userJuridica = PessoaJuridica::find($cnpj);
        $user = User::find($userJuridica->user_iduser);
        $userJuridica->razaoSocial=$request->razaoSocial;
        $user->name = $request->nome;
        $user->telefone = $request->telefone;
        $userJuridica->save();
        $user->save();
        return redirect()->route('perfil');
    }
}
