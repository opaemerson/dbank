

@extends('padrao.corpo')

@section('conteudo')
    <div>
        <form action="{{ route('processo.criarusuario') }}" method="POST">
            @csrf
            <h1 class="text-center">Criar Usuario</h1>
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
                    @if($errors->has('nome'))
                    {{ $errors->first('nome') }}
                    @endif
            </div>

            <div>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
            </div>
            <br>
            <button type="submit" class="botao-criar">Enviar</button>
            <a href="{{ route('site.minhaconta') }}">Voltar</a>
        </form>
    </div>
@endsection