<x-layout-app page-title="Controle de Peso [Detalhes]">

    @php
        $page = 'Controle de Peso [Detalhes]';
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
                <a href="{{ route('param.controle.peso.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
            </div>
        </div>
    </div>

</x-layout-app>
