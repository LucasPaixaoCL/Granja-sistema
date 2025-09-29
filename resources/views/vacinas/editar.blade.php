<x-layout-app page-title="Vacina [Editar]">

    @php
        $page = 'Vacina [Editar]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('vacinas.update') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <input type="hidden" name="id" id="id" value="{{ $dados['id'] }}">

                            <div class="col-md-6 mb-6">
                                <label for="data_prevista" class="form-label">Data Prevista</label>
                                <input type="date" class="form-control" id="data_prevista" name="data_prevista"
                                    readonly disabled value="{{ $dados['data_prevista'] }}">
                                @error('data_prevista')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-6">
                                <label for="data_realizada" class="form-label">Data da Aplicação</label>
                                <input type="date" class="form-control" id="data_realizada" name="data_realizada"
                                    required value="{{ old('data_realizada', $dados['data_prevista']) }}">
                                @error('data_realizada')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('vacinas.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
