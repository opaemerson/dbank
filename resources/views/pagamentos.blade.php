@extends('padrao.corpo')
    @if (session()->has('nome'))
        @section('conteudo')
            Exibindo {{ $pagamentos->count() }} registros de um total de {{ $pagamentos->total() }} encontrados.
            <table>
                <thead>
                    <tr>
                        <th>Valor</th>
                        <th>Arquivo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pagamentos as $pagamento)
                        <tr>
                            <td>{{ $pagamento->valor }}</td>
                            <td>{{ $pagamento->arquivo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ $pagamentos->previousPageUrl() }}"> < Anterior </a>

            &nbsp;&nbsp;

            <a href="{{ $pagamentos->nextPageUrl() }}"> Proximo > </a>
        @endsection
    @else
        @section('conteudo')
            Faca login para mostrar os registros.
        @endsection
@endif

