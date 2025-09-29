<x-layout-app page-title="Mortalidade [Parâmetros]">

    @php
        $page = 'Mortalidade [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('param.mortalidade.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-6">
                                <label for="semana" class="form-label">Semana</label>
                                <input type="number" class="form-control" id="semana" name="semana" required
                                    value="{{ old('semana') }}">
                                @error('semana')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-6">
                                <label for="padrao" class="form-label">Padrão</label>
                                <input type="text" class="form-control" id="padrao" name="padrao" required
                                    value="{{ old('padrao') }}">
                                @error('padrao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <a href="{{ route('param.mortalidade.index') }}"
                            class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
