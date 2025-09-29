<x-layout-app page-title="Forma de Pagamento [Detalhes]">

    @php
        $page = 'Forma de Pagamento [Detalhes]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="col-span-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $page }}</h5>
            </div>
            <div class="card-body">
            </div>
            <div class="card-footer">
                <a href="{{ route('formas_pgto.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
            </div>
        </div>
    </div>

</x-layout-app>
