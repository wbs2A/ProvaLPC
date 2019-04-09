<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Classificacao;
use App\Model\Carros;
use Illuminate\Support\Facades\Auth;
use App\Model\Acessorio;
use App\Model\Imagem;
use App\Model\Locadora;
use App\Model\PessoaFisica;
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
        if (isset($value)) {
            if (Auth::check()) {
                $user = Auth::user();
                $pessoa = PessoaFisica::where('user_iduser', $user->iduser)->get();
                $cpf = $pessoa[0]->idpessoaFisica;
                $request->session()->forget('data');
                $acessorios=Acessorio::all();
                $todos= Classificacao::todos();
                $carros=Carros::where('locadora_idLocadora','=',$value['locadoraretirada'])->get();
                $data = array();
                $tmp = array();
                foreach ($carros as $car){
                    $tmp["carro"]= $car;
                    $tmp['classificacao'] = Classificacao::find($car->idClassificacao);
                    $tmp["acessorios"] = Acessorio::join('carros_acessorio', function($q) use ($car, $value) {
                                            $q->on('carros_acessorio.acessorio_idacessorio', '=', 'acessorio.idacessorio')
                                                ->where('carros_acessorio.carros_idcarro', '=', "$car->idcarro");
                                         })->get();
                    $tmp["imagens"] = Imagem::join('carros_has_imagens', function($q) use ($car) {
                                        $q->on('carros_has_imagens.imagens_idimagens', '=', 'imagens.idimagens')
                                            ->where('carros_has_imagens.carros_idcarro', '=', "$car->idcarro");
                                      })->get();
                    array_push($data,$tmp);
                }

                return view('locacao',[ 'cpf'=> $cpf, 'carros' => $data, 'acessorios' =>$acessorios, 'preDados' =>$value, 'categorias' => $todos]);
            }else{
                return redirect()->route('login')->with(['data' => $value]);    
            }
        }else{
            return redirect()->route('/');
        }
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
    public function setgetCarLocacaoAcessorio(Request $request){
        $value=$request->all();
        $carros = Carros::join('carros_acessorio', function($q) use ($value) {
                $q->on('carros_acessorio.carros_idcarro', '=', 'idcarro')
                ->where('carros_acessorio.acessorio_idacessorio', '=', (int) $value['acessorio']);
            })
            ->where('locadora_idLocadora','=',$value['predados']['locadoraretirada'])
            ->get();
        $ret = array();
        $tmp = array();
        foreach ($carros as $car){
            $tmp["carro"]= $car;
            $tmp['classificacao'] = Classificacao::find($car->idClassificacao);
            $tmp["acessorios"] = Acessorio::join('carros_acessorio', function($q) use ($car, $value) {
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
}
