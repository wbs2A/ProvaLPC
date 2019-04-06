<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Classificacao;
use App\Model\Carros;
use App\Model\Locadora;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos= Classificacao::todos();
        return view('index', ['categorias'=> $todos]);
    }
    public function getLocadora($categoria){
        $data=Carros::join('locadora','carros.locadora_idLocadora','=','locadora.idLocadora')
        ->join('classificacaocarro', 'carros.idClassificacao', '=','classificacaocarro.idclassificacao')
        ->select('locadora.nome', 'locadora.idLocadora')
        ->where('classificacaocarro.idclassificacao','=',$categoria)
        ->get();
        return $data;
    }
}
