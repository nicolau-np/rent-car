<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login()
    {
        $data = [
            'title' => "Iniciar Sessão",
            'menu' => "login",
            'submenu' =>null,
            'type' =>"login",
        ];

        return view('user.login', $data);
    }


    public function logar(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        $credencials = $request->only('email', 'password');
        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        } else {
            return back()->with(['error' => "E-mail ou Palavra-Passe Incorrectos"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){
        $data = [
            'title' => "Registro",
            'menu' => "registro",
            'submenu' =>null,
            'type' =>"register",
        ];

        return view('user.register', $data);
    }

    public function regiter_store(Request $request){
        $request->validate([
            'nome' => ['required','string', 'min:4', 'max:255'],
            'sobrenome' => ['required','string', 'min:4', 'max:255'],
            'email' => ['required','email', 'min:4', 'max:255'],
            'bairro' => ['required','string', 'min:4', 'max:255'],
            'telefone' => ['required','Integer'],
            'palavra_passe' =>['required', 'string', 'min:6', 'max:255'],
            'password_confirm'=>['required', 'string', 'min:6', 'max:255'],
            'foto' => ['required', 'mimes:jpg,jpeg,png,JPG,JPEG,PNG', 'max:10000'],
        ]);

        $data['pessoa']=[
                'nome'=>$request->nome,
                'sobrenome'=>$request->sobrenome,
                'foto'=>null,
                'estado'=>"on",
        ];
        $data['user'] = [
            'id_pessoa'=>null,
            'email'=>$request->email,
            'acesso'=>"user",
            'password'=>$request->palavra_passe,
            'estado'=>"on",
        ];

        $data['cliente']= [
            'id_pessoa'=>null,
            'bairro'=>$request->bairro,
            'telefone'=>$request->telefone,
        ];

    }

}