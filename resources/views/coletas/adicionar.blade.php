<x-layout-app page-title="Coleta de Ovos">

    @php
        $page = 'Coleta de Ovos';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('coletas.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 mb-6">
                                <label for="lote" class="form-label">Lote</label>
                                <select class="form-control" name="lote" id="lote">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['lotes'] as $lote)
                                        <option value="{{ $lote->id }}"
                                            {{ old('lote') == $lote->id ? 'selected' : '' }}>
                                            {{ $lote->num_lote }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('lote')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-6">
                                <label for="data_coleta" class="form-label">Data da Coleta</label>
                                <input type="date" class="form-control" id="data_coleta" name="data_coleta" required
                                    value="{{ old('data_coleta', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                @error('data_coleta')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-6">
                                <label for="qtde_ovos" class="form-label">Qtde Ovos</label>
                                <input type="number" class="form-control" id="qtde_ovos" name="qtde_ovos" required
                                    value="{{ old('qtde_ovos') }}">
                                @error('qtde_ovos')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('coletas.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
