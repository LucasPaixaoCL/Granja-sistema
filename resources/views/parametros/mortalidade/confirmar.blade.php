<x-layout-app page-title="Mortalidade [Detalhes]">

    @php
        $page = 'Mortalidade [Detalhes]';
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
                    <div class="text-left">
                        <h3 class="my-5">Semana: {{ $param_mortalidade->semana }} | Padrão:
                            {{ $param_mortalidade->padrao }}</h3>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{ route('param.mortalidade.index') }}" class="btn btn-secondary px-5">Não</a>
                    <a href="{{ route('param.mortalidade.destroy', ['id' => Crypt::encryptString($param_mortalidade->id)]) }}"
                        class="btn btn-danger px-5">Sim</a>
                </div>

            </div>
        </div>
    </div>

</x-layout-app>
