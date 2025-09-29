<x-layout-app page-title="Programa de Luz [Parâmetros]">

    @php
        $page = 'Programa de Luz [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('mortes.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="num_lote" class="form-label">Lote</label>
                            <input type="number" class="form-control" id="num_lote" name="num_lote" required
                                value="{{ old('num_lote') }}">
                            @error('num_lote')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('mortes.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
