<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo</title>
</head>
<body>
    @include('padrao.cabecalho')
        @if (session()->has('nome'))
        <div style="position: fixed; bottom: 0; right: 0; margin: 15px;">
            <?php
            $usuario = session('nome');
            echo 'Usuario: ' . $usuario;
            echo '<br><br>';
            ?>
        </div>
        <form method="POST" action="{{ route('processo.sair') }}">
            @csrf
            <div style="position: fixed; bottom: 0; right: 0; margin: 10px;">
            <button type="submit">Sair</button>
            </div>
        </form>
        @endif
    @yield('conteudo')
</body>
</html>