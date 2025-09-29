<x-layout-app page-title="Excluir Morte">

    @php
        $page = 'Excluir Morte';
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
                        <h3 class="my-5">Data da(s) Morte(s):
                            {{ \Carbon\Carbon::parse($dados['morte']->data_morte)->format('d/m/Y') }} || Mortes:
                            {{ $dados['morte']->qtde_mortes }}</h3>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="card-header">
                    <a href="{{ route('mortes.index') }}" class="btn btn-secondary px-5">Não</a>
                    <a href="{{ route('mortes.destroy', ['id' => Crypt::encryptString($dados['morte']->id)]) }}"
                        class="btn btn-danger px-5">Sim</a>
                </div>

            </div>
        </div>
    </div>

</x-layout-app>
