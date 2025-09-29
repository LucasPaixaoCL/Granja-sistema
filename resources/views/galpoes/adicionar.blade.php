<x-layout-app page-title="Galões [Adicionar]">

    @php
        $page = 'Galões [Adicionar]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-6">
            <div class="card">
                <div class="card-header">
                    <h5>Adicionar {{ $page }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('galpoes.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-6">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required
                                    value="{{ old('descricao') }}">
                                @error('descricao')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4 mb-6">
                                <label for="largura" class="form-label">Largura</label>
                                <input type="number" class="form-control" id="largura" name="largura" required
                                    value="{{ old('largura') }}">
                                @error('largura')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-6">
                                <label for="comprimento" class="form-label">Comprimento</label>
                                <input type="number" class="form-control" id="comprimento" name="comprimento" required
                                    value="{{ old('comprimento') }}">
                                @error('comprimento')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-6">
                                <label for="densidade" class="form-label">Densidade</label>
                                <select class="form-control" name="densidade" id="densidade">
                                    <option value="0">Selecione...</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                                @error('densidade')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('galpoes.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </div>
    </div>

</x-layout-app>
