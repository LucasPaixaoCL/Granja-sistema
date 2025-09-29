<x-layout-app page-title="Controle de Peso [Editar]">

    @php
        $page = 'Controle de Peso [Editar]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('pesos.update') }}" method="post">
        @csrf

        <input type="hidden" name="id" id="id" value="{{ $dados['id'] }}">

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-6">
                                <label for="data_pesagem" class="form-label">Data da Pesagem</label>
                                <input type="date" class="form-control" id="data_pesagem" name="data_pesagem"
                                    value="{{ old('data_pesagem', $dados['data_pesagem'] ?? now()->format('Y-m-d')) }}">
                                @error('data_pesagem')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-6">
                                <label for="peso_real" class="form-label">Peso Real</label>
                                <input type="number" class="form-control" id="peso_real" name="peso_real" required
                                    value="{{ old('peso_real', $dados['peso_real']) }}">
                                @error('peso_real')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pesos.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
