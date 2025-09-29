<x-layout-app page-title="Cliente [Detalhes]">

    @php
        $page = 'Cliente [Detalhes]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="col-span-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $page }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-6">
                        <label class="form-label">Núcleo: </label>
                        <span>{{ $dados['cliente']->nome }}</span>
                    </div>
                    <div class="col-md-2 mb-6">
                        <label class="form-label">Email: </label>
                        <span>{{ $dados['cliente']->email }}</span>
                    </div>
                    <div class="col-md-2 mb-6">
                        <label class="form-label">Telefone: </label>
                        <span>{{ $dados['cliente']->telefone }}</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
            </div>
        </div>
    </div>

</x-layout-app>
