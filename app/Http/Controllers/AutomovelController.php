<?php

namespace App\Http\Controllers;

use App\Automovel;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automoveis = Automovel::paginate(5);
        $data = [
            'title' => "Automoveis",
            'menu' => "Automoveis",
            'submenu' => "Listar",
            'type' => "automovel",
            'getAutomoveis' => $automoveis,
        ];

        return view('automoveis.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Automoveis",
            'menu' => "Automoveis",
            'submenu' => "Novo",
            'type' => "automovel",
        ];

        return view('automoveis.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => ['required', 'string', 'min:2', 'max:255'],
            'modelo' => ['required', 'string', 'min:2', 'max:255'],
            'cilindragem' => ['required', 'string', 'min:2', 'max:255'],
            'matricula' => ['required', 'string', 'min:5', 'max:255'],
            'estado' => ['required', 'string', 'min:2', 'max:3'],
            'modalidade' => ['required', 'string', 'min:2', 'max:255'],
            'preco' => ['required', 'numeric', 'min:1'],
            'foto' => ['required', 'mimes:jpg,jpeg,png,JPG,JPEG,PNG', 'max:10000'],
        ]);

        $data = [
            'marca'=>$request->marca,
            'modelo'=>$request->modelo,
            'cilindragem'=>$request->cilindragem,
            'matricula'=>$request->matricula,
            'foto'=>null,
            'preco' =>$request->preco,
            'tipo'=>$request->modalidade,
            'estado'=>$request->estado,
        ];

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $path = $request->file('foto')->store('img_automoveis');
            $data['foto'] = $path;
        }

        if(Automovel::create($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
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
        $automovel = Automovel::find($id);
        if(!$automovel){
            return back()->with(['error'=>"Nao encontrou"]);
        }
        $data = [
            'title' => "Automoveis",
            'menu' => "Automoveis",
            'submenu' => "Editar",
            'type' => "automovel",
            'getAutomovel'=>$automovel,
        ];

        return view('automoveis.edit', $data);
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
        $automovel = Automovel::find($id);
        if(!$automovel){
            return back()->with(['error'=>"Nao encontrou"]);
        }

        $request->validate([
            'marca' => ['required', 'string', 'min:2', 'max:255'],
            'modelo' => ['required', 'string', 'min:2', 'max:255'],
            'cilindragem' => ['required', 'string', 'min:2', 'max:255'],
            'matricula' => ['required', 'string', 'min:5', 'max:255'],
            'estado' => ['required', 'string', 'min:2', 'max:3'],
        ]);

        $data = [
            'marca'=>$request->marca,
            'modelo'=>$request->modelo,
            'cilindragem'=>$request->cilindragem,
            'matricula'=>$request->matricula,
            'foto'=>$automovel->foto,
            'preco' =>$request->preco,
            'tipo'=>$request->modalidade,
            'estado'=>$request->estado,
        ];

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $request->validate([
                'foto' => ['required', 'mimes:jpg,jpeg,png,JPG,JPEG,PNG', 'max:10000'],
            ]);
            if ($automovel->foto != "" && file_exists($automovel->foto)) {
                unlink($automovel->foto);
            }

            $path = $request->file('foto')->store('img_automoveis');
            $data['foto'] = $path;
        }


        if(Automovel::find($id)->update($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
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