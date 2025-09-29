<x-layout-app page-title="Excluir Colaborador">

    <div class="w-100 p-4">

        <h3>Excluir Colaborador</h3>

        <hr>

        <p>Tem certeza de que deseja excluir este colaborador?</p>

        <div class="text-letf">
            <h3 class="my-5">{{ $colaborator->name }}</h3>
            <a href="{{ route('colaborators.all') }}" class="btn btn-secondary px-5">Não</a>
            <a href="{{ route('colaborators.delete-confirm', ['id' => $colaborator->id]) }}"
                class="btn btn-danger px-5">Sim</a>
        </div>

    </div>

</x-layout-app>
