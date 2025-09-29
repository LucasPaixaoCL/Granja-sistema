<x-layout-app page-title="Consumo de Ração [Parâmetros]">

    @php
        $page = 'Consumo de Ração [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('param.consumo.racao.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="semana" class="form-label">Semana</label>
                                <input type="number" class="form-control" id="semana" name="semana" required
                                    value="{{ old('semana') }}">
                                @error('semana')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="consumo_dia" class="form-label">Consumo por Dia</label>
                                <input type="number" class="form-control" id="consumo_dia" name="consumo_dia" required
                                    value="{{ old('consumo_dia') }}">
                                @error('consumo_dia')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="consumo_semana" class="form-label">Consumo por Semana</label>
                                <input type="number" class="form-control" id="consumo_semana" name="consumo_semana"
                                    required value="{{ old('consumo_semana') }}">
                                @error('consumo_semana')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('param.consumo.racao.index') }}"
                            class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-layout-app>
