<x-layout-app page-title="Vendas">

    @php
        $page = 'Vendas';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('vendas.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">

            <div class="col-span-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $page }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mb-6">
                                <label for="data_venda" class="form-label">Data da Venda</label>
                                <input type="date" class="form-control" id="data_venda" name="data_venda" required
                                    value="{{ old('data_venda', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                @error('data_venda')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="formato" class="form-label">Formato</label>
                                <select class="form-control" name="formato" id="formato" required
                                    onchange="verificarFormato(); calcularOvos();">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['formatos'] as $formato)
                                        <option value="{{ $formato->id }}">{{ $formato->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('formato')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select class="form-control" name="tipo" id="tipo" disabled>
                                    <option value="0">Selecione...</option>
                                    <option value="6">06</option>
                                    <option value="12">12</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                </select>
                                @error('tipo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mb-6">
                                <label for="quantidade" class="form-label">Quantidade</label>
                                <input type="number" class="form-control" placeholder="0" step="1"
                                    id="quantidade" name="quantidade" onchange="calcularSubtotal();"
                                    oninput="calcularOvos();" required value="{{ old('quantidade') }}">
                                @error('quantidade')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="valor_unitario" class="form-label">Valor Unitário</label>
                                <input type="number" class="form-control" placeholder="0,00" step="0.01"
                                    id="valor_unitario" name="valor_unitario" onchange="calcularSubtotal();" required
                                    value="{{ old('valor_unitario') }}">
                                @error('valor_unitario')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="desconto" class="form-label">Desconto</label>
                                <input type="number" class="form-control" onchange="calcularSubtotal();"
                                    placeholder="0,00" step="0.01" id="desconto" name="desconto"
                                    value="{{ old('desconto') }}">
                                @error('desconto')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="subtotal" class="form-label">Subtotal</label>
                                <input type="number" class="form-control" placeholder="0,00" id="subtotal"
                                    name="subtotal" value="{{ old('subtotal') }}" readonly>
                                @error('subtotal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="total_ovos" class="form-label">Total de Ovos</label>
                                <input type="number" class="form-control" placeholder="0" id="total_ovos"
                                    name="total_ovos" value="{{ old('total_ovos') }}" readonly>
                                @error('total_ovos')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-6">
                                <label for="cliente" class="form-label">Cliente</label>
                                <div class="d-flex gap-2">
                                    <select class="form-control" name="cliente" id="cliente" required>
                                        <option value="0">Selecione...</option>
                                        @foreach ($dados['clientes'] as $cliente)
                                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{ route('clientes.create') }}" target="_blank">
                                        <button type="button" class="btn btn-primary px-3">+</button>
                                    </a>
                                </div>
                                @error('cliente')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-6">
                                <label for="vendedor" class="form-label">Vendedor</label>
                                <div class="d-flex gap-2">
                                    <select class="form-control" name="vendedor" id="vendedor">
                                        <option value="0">Selecione...</option>
                                        @foreach ($dados['vendedores'] as $vendedor)
                                            <option value="{{ $vendedor->id }}">{{ $vendedor->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('vendedor')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-6">
                                <label for="situacao" class="form-label">Situação</label>
                                <select class="form-control" name="situacao" id="situacao">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['situacoes'] as $situacao)
                                        <option value="{{ $situacao->id }}">{{ $situacao->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('situacao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-6">
                                <label for="forma_pgto" class="form-label">Forma de Pagamento</label>
                                <select class="form-control" name="forma_pgto" id="forma_pgto">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['formas_pgto'] as $formas)
                                        <option value="{{ $formas->id }}">{{ $formas->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('forma_pgto')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('vendas.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>

                </div>
            </div>

        </div>

    </form>

    <script>
        function calcularSubtotal() {
            const quantidade = parseFloat(document.getElementById('quantidade').value) || 0;
            const valorUnitario = parseFloat(document.getElementById('valor_unitario').value) || 0;
            const desconto = parseFloat(document.getElementById('desconto').value) || 0;

            let subtotal = (quantidade * valorUnitario) - desconto;
            subtotal = subtotal < 0 ? 0 : subtotal;

            document.getElementById('subtotal').value = subtotal.toFixed(2);
        }
    </script>

    <script>
        function verificarFormato() {
            const formato = document.getElementById("formato").value;
            const tipo = document.getElementById("tipo");

            if (formato == 2) { // 2 = cartela
                tipo.disabled = false;
            } else {
                tipo.disabled = true;
            }
        }
    </script>

    <script>
        function calcularOvos() {
            const formato = document.getElementById('formato').value;
            const tipo = parseInt(document.getElementById('tipo').value) || 0;
            const quantidade = parseInt(document.getElementById('quantidade').value) || 0;
            const totalOvosInput = document.getElementById('total_ovos');

            let total = 0;

            if (formato == 1) {
                total = 360 * quantidade;
            } else {
                total = tipo * quantidade;
            }

            totalOvosInput.value = total;
        }
    </script>

</x-layout-app>
