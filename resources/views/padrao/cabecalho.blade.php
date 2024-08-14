<style>
    .header-item {
        font-weight: normal;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .header-item:hover {
        background-color: #f0f0f0;
    }
</style>

<div style="display: flex; justify-content: space-between; background-color: rgb(43, 43, 43);">
    <h1 class="header-item" style="color: #2ecc71;">
        <a href="{{ route('site.principal') }}" style="text-decoration: none; color: inherit;">Principal</a>
    </h1>
    <h1 class="header-item" style="color: blue;">
        <a href="{{ route('site.minhaconta') }}" style="text-decoration: none; color: inherit;">Minha Conta</a>
    </h1>
    <h1 class="header-item" style="color: red;">
        <a href="{{ route('site.pagamentos') }}" style="text-decoration: none; color: inherit;">Pagamentos</a>
    </h1>
</div>
