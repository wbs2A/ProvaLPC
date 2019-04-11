<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Classificacao;
use Illuminate\Support\Facades\Auth;
use App\Model\Locadora;
use App\Model\Acessorio;
use App\Model\Carros;
use App\Model\Imagem;
use App\Model\PessoaJuridica;
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
        if ((Auth::check() && Auth::user()->tipo == 0) || Auth::user() == null) {
            $todos= Classificacao::todos();
            return view('index', ['categorias'=> $todos]);
        }else{
            $locadoras = Locadora::join('pessoajuridica', 'idPJ','=','pessoaJuridica_idPJ')->
            join('user', 'user_iduser', '=', 'iduser')->where('user.iduser', '=', Auth::user()->iduser)->get();
            $ret = array();
            $tmp = array();
            foreach ($locadoras as $value) {
                $carros = Carros::where('locadora_idLocadora','=',$value->idLocadora)->get();
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
            }
            return view('index', ['carros'=> $ret]);
        }
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
