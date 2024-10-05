@extends('padrao.corpo')

@section('conteudo')
<form action="{{ route('pagamento.incluir') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="hidden" id="pagador" name="pagador" value="{{ Auth::check() ? Auth::user()->id : '' }}">
        <label for="beneficiario">Beneficiario</label>
        <select name="beneficiario" id="beneficiario" required>
            <option value="" disabled selected>Selecione um beneficiário</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" required step="0.01" min="0">
    </div>
    <div class="form-group">
        <label for="comprovante">Comprovante</label>
        <input type="text" name="comprovante" id="comprovante" required>
    </div>
    <div class="form-group">
        <button type="submit">Pagar</button>
    </div>
</form>
@endsection