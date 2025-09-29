<x-layout-app page-title="Mortes">

    @php
        $page = 'Mortes';
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
                        <div class="row">
                            <div class="col-md-4 mb-6">
                                <label for="lote" class="form-label">Lote</label>
                                <select class="form-control" name="lote" id="lote">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['lotes'] as $lote)
                                        <option value="{{ $lote->id }}">{{ $lote->num_lote }}</option>
                                    @endforeach
                                </select>
                                @error('lote')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-6">
                                <label for="data_morte" class="form-label">Data da Morte</label>
                                <input type="date" class="form-control" id="data_morte" name="data_morte" required
                                    value="{{ old('data_morte', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                @error('data_morte')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-6">
                                <label for="qtde_mortes" class="form-label">Qtde Mortes</label>
                                <input type="number" class="form-control" id="qtde_mortes" name="qtde_mortes" required
                                    value="{{ old('qtde_mortes') }}">
                                @error('qtde_mortes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <a href="{{ route('mortes.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
