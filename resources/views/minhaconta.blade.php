@extends('padrao.corpo')

@if (session()->has('nome'))
    @section('conteudo')
        >Inclusao do meu pagamento
        <br>
        >Listagem do meu pagamento
    @endsection
@else
    @section('conteudo')
        <div class="container">
            <h1>Logar</h1>
            <form action="{{ route('processo.logar') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>
                </div>
                <div class="form-group">
                    <button type="submit">Entrar</button>
                </div>
            </form>
            <div class="form-group create-account">
                <p><a href="{{ route('site.cadastro') }}">Cadastrar</a></p>
            </div>
        </div>
    @endsection
@endif