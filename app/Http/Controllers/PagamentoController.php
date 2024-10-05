<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use App\Models\Pagamento;

class PagamentoController extends Controller
{
    public function abaPagamento()
    {
        $usuarios = Usuario::all();
        return view('pagamento/abaPrincipal', compact('usuarios'));
    }

    public function incluirPagamento(Request $request)
    {

        $request->validate([
            'beneficiario' => 'required|exists:usuarios,id',
            'valor' => 'required|numeric|min:0',
            'comprovante' => 'required|string',
            'pagador' => 'required'
        ]);
    
        $pagamento = new Pagamento();

        $pagamento->usuario_id = $request->input('beneficiario');
        $pagamento->valor = $request->input('valor');
        $pagamento->arquivo = $request->input('comprovante');
        $pagamento->pagador = $request->input('pagador');

        $pagamento->save();
    
        $success = 'Pagamento incluído com sucesso!';
    
        return redirect()->route('site.minhaconta')->with('success', $success);
    }
}
