<?php

namespace App\Http\Controllers;

use App\Automovel;
use App\Cliente;
use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::paginate(5);
        $data = [
            'title' => "Reservas",
            'menu' => "Reservas",
            'submenu' => "Listar",
            'type' => "reservas",
            'getReservas' => $reservas,
        ];

        return view('reserva.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $automoveis = Automovel::all();
        $data = [
            'title' => "Reservar",
            'menu' => "Reservar",
            'submenu' => "Novo",
            'type' => "reservas",
            'getAutomoveis'=>$automoveis,
        ];

        return view('reserva.create', $data);
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
        $automovel= Automovel::find($id);
        if(!$automovel){
            return back()->with(['error'=>"Nao encontrou"]);
        }
        $data = [
            'title' => "Reservar",
            'menu' => "Reservar",
            'submenu' => "Novo",
            'type' => "reservas",
            'getAutomovel' =>$automovel,
        ];

        return view('reserva.edit', $data);
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
        $cliente = Cliente::where(['id_pessoa'=>Auth::user()->pessoa->id])->first();
        $automovel= Automovel::find($id);
        if(!$automovel){
            return back()->with(['error'=>"Nao encontrou"]);
        }

        $request->validate([
            'tempo'=>['required','Integer', 'min:1'],
            'hora' =>['required','string'],
            'data' =>['required', 'date'],
            'local_receber'=>['required', 'string'],
        ]);

        $preco_total = $request->tempo * $automovel->preco;
        $data = [
            'id_cliente'=>$cliente->id,
            'id_automovel'=>$automovel->id,
            'data_requisicao'=>$request->data,
            'hora_requisicao'=>$request->hora,
            'tempo'=>$request->tempo,
            'preco_total'=>$preco_total,
            'local_receber'=>$request->local_receber,
            'estado'=>"on",
        ];

        if(Reserva::create($data)){
            if(Automovel::find($automovel->id)->update(['estado'=>'off'])){
                return back()->with(['success'=>"Feito com sucesso"]);
            }

        }
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
}