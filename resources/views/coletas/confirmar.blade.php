<x-layout-app page-title="Excluir Coleta">

    @php
        $page = 'Excluir Coleta';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-6">
            <div class="card">

                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}

                <div class="card-body">
                    <p>Tem certeza de que deseja excluir este registro?</p>
                    <div class="text-letf">
                        <h3 class="my-5">Lote: {{ $dados['coleta']->lote->num_lote }} - Data:
                            {{ \Carbon\Carbon::parse($dados['coleta']->data_coleta)->format('d/m/Y') }} - Qtde Ovos:
                            {{ $dados['coleta']->qtde_ovos }} </h3>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{ route('coletas.index') }}" class="btn btn-secondary px-5">Não</a>
                    <a href="{{ route('coletas.destroy', ['id' => Crypt::encryptString($dados['coleta']->id)]) }}"
                        class="btn btn-danger px-5">Sim</a>
                </div>

            </div>
        </div>
    </div>

</x-layout-app>
