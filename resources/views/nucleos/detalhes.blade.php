<x-layout-app page-title="Núcleos [Detalhes]">

    @php
        $page = 'Núcleos [Detalhes]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="col-span-12">
        <div class="card">

            <div class="card-header">
                <h5>{{ $page }}</h5>
            </div>

            <div class="card-body">

                <div class="row mt-3">

                    <div class="col-md-2">
                        <label class="form-label">Núcleo: </label>
                        {{ $dados['nucleo']->descricao }}
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">
                            Total de Lotes:</label>
                        {{ $dados['total_lotes'] }}
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">
                            Situação:</label>
                        {{ $dados['nucleo']->situacao == 1 ? 'Ativo' : 'Inativo' }}
                    </div>

                </div>

                <div class="row mt-6">

                    <div class="col-md-12">
                        <label class="form-label">
                            Observações:</label><br>
                        <span>{{ $dados['nucleo']->observacoes }}</span>
                    </div>

                </div>

            </div>

            <div class="card-footer">
                <a href="{{ route('nucleos.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
            </div>

        </div>
    </div>

</x-layout-app>
