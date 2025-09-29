<x-layout-app page-title="Tipos de Despesa [Parâmetros]">

    @php
        $page = 'Tipos de Despesa [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('param.tipo.despesa.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required
                                    value="{{ old('descricao') }}">
                                @error('descricao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <a href="{{ route('param.tipo.despesa.index') }}"
                            class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-layout-app>
