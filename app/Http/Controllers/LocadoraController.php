<?php

namespace App\Http\Controllers;

use App\Model\Acessorio;
use App\Model\Carros;
use App\Model\Classificacao;
use App\Model\Imagem;
use App\Model\Locadora;
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
        $retirada = Locadora::find($request->localentrega);
        $entrega = Locadora::find($request->localretirada);
        return redirect('reserva')->with(["imagens"       => $request->imagens,
                                              "carro"         => $request->carro,
                                              "usuario"       => $request->user,
                                              "quantdias"     => $request->quantdias,
                                              "dataentrega"   => $request->dataentrega,
                                              "dataretirada"  => $request->dataretirada,
                                              "localentrega"  => $entrega,
                                              "localretirada" => $retirada]);
    }
}
