<x-layout-app page-title="Núcleos">

    @php
        $page = 'Núcleos';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('nucleos.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">

                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>

                    <div class="card-body">

                        <div class="row mt-3">

                            <div class="col-md-4">
                                <label for="descricao" class="form-label">Nome do Núcleo</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required
                                    value="{{ old('descricao') }}">
                                @error('descricao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="area_total" class="form-label">Área Total (m2)</label>
                                <input type="text" class="form-control" id="area_total" name="area_total" required
                                    value="{{ old('area_total') }}">
                                @error('area_total')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="situacao" class="form-label">Situação</label>
                                <select class="form-control" name="situacao" id="situacao">
                                    @foreach ($dados['situacoes'] as $situacao)
                                        <option value="{{ $situacao['id'] }}">{{ $situacao['descricao'] }}</option>
                                    @endforeach
                                </select>
                                @error('situacao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row mt-6">

                            <div class="col-md-12">
                                <label for="observacoes" class="form-label">Observações</label>
                                <input type="text" class="form-control" id="observacoes" name="observacoes"
                                    value="{{ old('observacoes') }}">
                                @error('observacoes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('nucleos.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>

                </div>
            </div>
        </div>

    </form>

</x-layout-app>
