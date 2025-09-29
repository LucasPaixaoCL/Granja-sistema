<x-layout-app page-title="Detalhe Programa de Vacinação [Parâmetros]">

    @php
        $page = 'Detalhe Programa de Vacinação [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('param.detalhe.programa.vacinacao.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-6">
                                <label for="programa_vacinacao" class="form-label">Programa de Vacinação</label>
                                <select class="form-control" name="programa_vacinacao" id="programa_vacinacao">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['detalhe_programa_vacinacao'] as $programa)
                                        <option value="{{ $programa->id }}">{{ $programa->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('programa_vacinacao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="dia" class="form-label">Dia</label>
                                <input type="number" class="form-control" id="dia" name="dia" required
                                    value="{{ old('dia') }}">
                                @error('dia')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="semana" class="form-label">Semana</label>
                                <input type="number" class="form-control" id="semana" name="semana" required
                                    value="{{ old('semana') }}">
                                @error('semana')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="enfermidade" class="form-label">Enfermidade</label>
                                <input type="text" class="form-control" id="enfermidade" name="enfermidade" required
                                    value="{{ old('enfermidade') }}">
                                @error('enfermidade')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label for="via_aplicacao" class="form-label">Via de Aplicação</label>
                                <select class="form-control" name="via_aplicacao" id="via_aplicacao">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['via_aplicacao'] as $via)
                                        <option value="{{ $via->id }}">{{ $via->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('via_aplicacao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('param.detalhe.programa.vacinacao.index') }}"
                            class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</x-layout-app>
