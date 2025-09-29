<x-layout-app page-title="Lote [Detalhes]">

    @php
        $page = 'Lote [Detalhes]';
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
                        <label for="nucleo" class="form-label">Núcleo: </label>
                        <span>{{ $dados['lote']['nucleo']->nome }}</span>
                    </div>
                    <div class="col-md-2 mb-6">
                        <label for="nucleo" class="form-label">Num Lote: </label>
                        <span>{{ $dados['lote']->num_lote }}</span>
                    </div>
                    <div class="col-md-3 mb-6">
                        <label for="nucleo" class="form-label">Data Lote: </label>
                        <span>{{ \Carbon\Carbon::parse($dados['lote']->data_lote)->format('d/m/Y') }}</span>
                    </div>
                    <div class="col-md-2 mb-6">
                        <label for="nucleo" class="form-label">Qtde Aves: </label>
                        <span>{{ $dados['lote']->qtde_aves }}</span>
                    </div>
                    <div class="col-md-2 mb-6">
                        <label for="nucleo" class="form-label">Semana: </label>
                        <span>{{ $dados['semana'] }}</span>
                    </div>
                    <div class="col-md-2 mb-6">
                        <label for="nucleo" class="form-label">Qtde Mortes: </label>
                        <span>{{ $dados['lote']->mortes->sum('qtde_mortes') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-6">
                        <label for="nucleo" class="form-label">Total de Ovos Produzidos: </label>
                        <span>{{ $dados['lote']->coletas->sum('qtde_ovos') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-6">
                        <label for="nucleo" class="form-label">Plano de Vacinação: </label>
                        <span></span>
                    </div>
                </div>
                {{-- 
                <div class="row">
                    <div class="col-md-4 mb-6">
                        <label for="nucleo" class="form-label">Fase de Criação: </label>
                        <span></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-6">
                        <label for="nucleo" class="form-label">Plano de Vacinação: </label>
                        <span></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-6">
                        <label for="nucleo" class="form-label">Consumo de Água: </label>
                        <span></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-6">
                        <label for="nucleo" class="form-label">Consumo de Ração: </label>
                        <span></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-6">
                        <label for="nucleo" class="form-label">Programa de Luz: </label>
                        <span></span>
                    </div>
                </div> --}}
            </div>
            <div class="card-footer">
                <a href="{{ route('lotes.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
            </div>
        </div>
    </div>

</x-layout-app>
