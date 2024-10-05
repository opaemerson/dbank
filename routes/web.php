<?php

use App\Http\Controllers\CoreController;
use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;


//Links
Route::get('/', [CoreController::class, 'principal'])->name('site.principal');
Route::get('/minhaconta', [CoreController::class, 'minhaconta'])->name('site.minhaconta');
Route::get('/pagamentos', [CoreController::class, 'lista_pagamentos'])->name('site.pagamentos');
Route::get('/cadastro', [CoreController::class, 'cadastro'])->name('site.cadastro');

//Acoes
Route::post('/criar', [CoreController::class, 'criarUsuario'])->name('processo.criarusuario');
Route::post('/sair', [CoreController::class, 'sair'])->name('processo.sair');
Route::post('/logar', [CoreController::class, 'logar'])->name('processo.logar');

//Acoes referente ao pagamento
Route::get('/aba_pagamento', [PagamentoController::class, 'abaPagamento'])->name('pagamento.aba');
Route::post('/incluir_pagamento', [PagamentoController::class, 'incluirPagamento'])->name('pagamento.incluir');

/*

***RETORNANDO MENSAGEM NA PROPRIA ROTA.

'/contato/{nome?}' -> faz com que nao seja obrigatorio

Route::get('/contato/{nome}', function(string $nome){
    echo 'Estamos aqui ' . $nome;
});

*** AGRUPANDO ROTAS:
Dessa forma o privado sempre vem antes ao acessar o link

Route::prefix('/privado')->group(function(){
    Route::get('/clientes', [ContatoController::class, 'clientes']);
 });

*** REDIRECIONANDO ROTAS:

Route::redirect('/rotaEXEMPLO', '/rotaDIRECIONADA');

*** REDIRENCIONANDO ROTAS PARA ERRO DE ACESSO AO LINK

Route::fallback(function(){
    echo 'Nao existe esse link, acesse a pagina inicial: href...';
});

*/

