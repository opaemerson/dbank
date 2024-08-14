<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use App\Models\Pagamento;

class CoreController extends Controller
{
    public function principal(){
        return view('principal');
    }

    public function minhaconta(){
        return view('minhaconta');
    }

    public function pagamentos(){
        return view('pagamentos');
    }

    public function cadastro(){
        return view('cadastro');
    }

    public function criarUsuario(Request $request){

        $regras = [
            'nome' => 'required|unique:usuarios|max:15',
        ];

        $feedback = [
            'nome.unique' => 'O nome ja esta em uso',
            'nome.max' => 'Limite maximo de 15 caracteres',
        ];
        
        $request->validate($regras,$feedback);    

        $usuario = new Usuario();
        $usuario->nome = $request->input('nome');
        $usuario->senha = $request->input('senha');

        $usuario->save();
        $success = true;
        Session::put('nome', $usuario->nome, 'senha', $usuario->senha);

        return redirect()->route('site.minhaconta')->with(compact('success'));
    }

    public function sair(){
        //remove apenas o nome da sessao
        // session()->forget('nome');
        
        //remove todos itens que abriram sessao
        session()->flush();

        return redirect()->route('site.minhaconta');
    }

    public function logar(Request $request){
        
        $usuario = Usuario::where('nome', $request['nome'])->where('senha', $request['senha'])->first();

        if ($usuario){
            $request->session()->put('nome', $usuario->nome);
            return redirect()->route('site.minhaconta');
        }

        return redirect()->route('site.minhaconta');
    }

    public function lista_pagamentos(){
        $pagamentos = Pagamento::paginate(3);

        return view('pagamentos')->with('pagamentos', $pagamentos);
    }
}
