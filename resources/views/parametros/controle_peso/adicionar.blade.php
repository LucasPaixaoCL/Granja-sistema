<x-layout-app page-title="Controle de Peso [Parâmetros]">

    @php
        $page = 'Controle de Peso [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('param.controle.peso.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="linhagem" class="form-label">Linhagem</label>
                                <select class="form-control" name="linhagem" id="linhagem">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['linhagens'] as $linhagem)
                                        <option value="{{ $linhagem['id'] }}">{{ $linhagem['descricao'] }}</option>
                                    @endforeach
                                </select>
                                @error('linhagem')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4 mb-3">
                                <label for="semana" class="form-label">Semana</label>
                                <input type="number" class="form-control" id="semana" name="semana" required
                                    value="{{ old('semana') }}">
                                @error('semana')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="peso_min" class="form-label">Peso Mínimo</label>
                                <input type="number" class="form-control" id="peso_min" name="peso_min" required
                                    value="{{ old('peso_min') }}">
                                @error('peso_min')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="peso_max" class="form-label">Peso Máximo</label>
                                <input type="number" class="form-control" id="peso_max" name="peso_max" required
                                    value="{{ old('peso_max') }}">
                                @error('peso_max')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('param.controle.peso.index') }}"
                            class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
