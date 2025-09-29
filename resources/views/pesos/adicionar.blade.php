<x-layout-app page-title="Lotes">

    @php
        $page = 'Lotes';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('lotes.store') }}" method="post">
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
                                <label for="nucleo" class="form-label">Núcleo</label>
                                <select class="form-control" name="nucleo" id="nucleo">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['nucleos'] as $nucleo)
                                        <option value="{{ $nucleo->id }}">{{ $nucleo->nome }}</option>
                                    @endforeach
                                </select>
                                @error('nucleo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="data_lote" class="form-label">Data do Lote</label>
                                <input type="date" class="form-control" id="data_lote" name="data_lote" required
                                    value="{{ old('data_lote', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                @error('data_lote')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="qtde_aves" class="form-label">Qtde Aves</label>
                                <input type="text" class="form-control" id="qtde_aves" name="qtde_aves" required
                                    value="{{ old('qtde_aves') }}">
                                @error('qtde_aves')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="qtde_machos" class="form-label">Qtde Machos</label>
                                <input type="text" class="form-control" id="qtde_machos" name="qtde_machos" required
                                    value="{{ old('qtde_machos') }}">
                                @error('qtde_machos')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('lotes.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-layout-app>
