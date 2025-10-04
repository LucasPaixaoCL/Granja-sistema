<x-layout-app page-title="Programa de Vacinação [Editar]">

    @php
        $page = 'Programa de Vacinação';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('parametros.programa_vacinacao.update', ['programa_vacinacao' => Crypt::encryptString($dados['plano_vacinacao']->id)]) }}" method="post">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Editar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required
                                value="{{ old('descricao', $dados['plano_vacinacao']->descricao) }}">
                            @error('descricao')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('parametros.programa_vacinacao.index') }}"
                            class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
