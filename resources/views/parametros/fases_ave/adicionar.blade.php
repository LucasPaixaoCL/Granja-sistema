<x-layout-app page-title="Fases da Ave [Parâmetros]">

    @php
        $page = 'Fases da Ave [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('param.fases.ave.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required
                                    value="{{ old('descricao') }}">
                                @error('descricao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4 mb-6">
                                <label for="semana_inicial" class="form-label">Semana Inicial</label>
                                <input type="text" class="form-control" id="semana_inicial" name="semana_inicial"
                                    required value="{{ old('semana_inicial') }}">
                                @error('semana_inicial')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-6">
                                <label for="semana_final" class="form-label">Semana Final</label>
                                <input type="text" class="form-control" id="semana_final" name="semana_final"
                                    required value="{{ old('semana_final') }}">
                                @error('semana_final')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('param.fases.ave.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
