<x-layout-app page-title="Vacinas">

    @php
        $page = 'Vacinas';
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
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome do Núcleo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required
                                value="{{ old('nome') }}">
                            @error('nome')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
