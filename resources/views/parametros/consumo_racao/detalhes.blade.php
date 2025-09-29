<x-layout-app page-title="Consumo de Ração [Detalhes]">

    @php
        $page = 'Consumo de Ração [Detalhes]';
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
                <a href="{{ route('param.consumo.racao.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
            </div>
        </div>
    </div>

</x-layout-app>
