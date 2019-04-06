<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Classificacao;
use App\Model\Carros;
use App\Model\Acessorio;
use App\Model\Locadora;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $value = $request->session()->get('data');
        $request->session()->forget('data');
        $acessorios=Acessorio::all();
        $todos= Classificacao::todos();
        $data=Carros::join('locadora','carros.locadora_idLocadora','=','locadora.idLocadora')
        ->join('classificacaocarro', 'carros.idClassificacao', '=','classificacaocarro.idclassificacao')
        ->where('classificacaocarro.idclassificacao','=',$value['categoria'])
        ->where('carros.locadora_idLocadora','=',(int) $value['locadora-retirada'])
        ->get();
        return view('locacao',[ 'carros' => $data, 'acessorios' =>$acessorios, 'preDados' =>$value, 'categorias' => $todos]);
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
    public function show($id)
    {
        //
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
    public function setPredados(Request $request){
        $data=$request->all();
        return redirect('locacao')->with('data', $data);
    }
    public function getCarLocacaoAcessorio(Request $request){
        $value=$request->all();
        dd($value);
        $data = Carros::join('locadora','carros.locadora_idLocadora','=','locadora.idLocadora')
        ->join('classificacaocarro', 'carros.idClassificacao', '=','classificacaocarro.idclassificacao')
        ->where('classificacaocarro.idclassificacao','=',$value['categoria'])
        ->where('carros.locadora_idLocadora','=',(int) $value['locadora-retirada'])
        ->get();
    }
}
