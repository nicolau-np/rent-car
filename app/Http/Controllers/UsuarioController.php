<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Pessoa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function login()
    {
        $data = [
            'title' => "Iniciar Sessão",
            'menu' => "login",
            'submenu' => null,
            'type' => "login",
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

    public function register()
    {
        $data = [
            'title' => "Registro",
            'menu' => "registro",
            'submenu' => null,
            'type' => "register",
        ];

        return view('user.register', $data);
    }

    public function regiter_store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:4', 'max:255'],
            'sobrenome' => ['required', 'string', 'min:4', 'max:255'],
            'email' => ['required', 'email', 'min:4', 'max:255', 'unique:usuarios,email'],
            'bairro' => ['required', 'string', 'min:4', 'max:255'],
            'telefone' => ['required', 'Integer'],
            'palavra_passe' => ['required', 'string', 'min:6', 'max:255'],
            'password_confirm' => ['required', 'string', 'min:6', 'max:255'],
            'foto' => ['required', 'mimes:jpg,jpeg,png,JPG,JPEG,PNG', 'max:10000'],
        ]);

        if ($request->palavra_passe != $request->password_confirm) {
            return back()->with(['error' => "Confirmacao de PalavraPasse incorrecta"]);
        }

        $data['pessoa'] = [
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'foto' => null,
            'estado' => "on",
        ];
        $data['user'] = [
            'id_pessoa' => null,
            'email' => $request->email,
            'acesso' => "user",
            'password' => md5($request->palavra_passe),
            'estado' => "on",
        ];

        $data['cliente'] = [
            'id_pessoa' => null,
            'bairro' => $request->bairro,
            'telefone' => $request->telefone,
        ];

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $path = $request->file('foto')->store('img_usuarios');
            $data['pessoa']['foto'] = $path;
        }

        $pessoa = Pessoa::create($data['pessoa']);
        if ($pessoa) {
            $data['user']['id_pessoa'] = $pessoa->id;
            $data['cliente']['id_pessoa'] = $pessoa->id;
            if (User::create($data['user'])) {
                if (Cliente::create($data['cliente'])) {
                    return back()->with(['success' => "Conta criada com sucesso"]);
                }
            }
        }
    }
}