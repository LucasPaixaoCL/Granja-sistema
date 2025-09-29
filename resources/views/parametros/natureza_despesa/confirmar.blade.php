<x-layout-app page-title="Natureza da Despesa [Parâmetros]">

    @php
        $page = 'Natureza da Despesa [Parâmetros]';
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
                        <h3 class="my-5">Natureza da Despesa: {{ $dados['natureza_despeza']->descricao }}</h3>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{ route('param.natureza.despesa.index') }}" class="btn btn-secondary px-5">Não</a>
                    <a href="{{ route('param.natureza.despesa.destroy', ['id' => Crypt::encryptString($dados['natureza_despeza']->id)]) }}"
                        class="btn btn-danger px-5">Sim</a>
                </div>

            </div>
        </div>
    </div>

</x-layout-app>
