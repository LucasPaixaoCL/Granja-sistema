<x-layout-app page-title="Despesas">

    @php
        $page = 'Despesas';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>Adicionar {{ $page }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('despesas.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 mb-6">
                                <label for="data_pedido" class="form-label">Data do Pedido</label>
                                <input type="date" class="form-control" id="data_pedido" name="data_pedido" required
                                    value="{{ old('data_pedido', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                @error('data_pedido')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="data_vencimento" class="form-label">Data do Vencimento</label>
                                <input type="date" class="form-control" id="data_vencimento" name="data_vencimento"
                                    required value="{{ old('data_vencimento') }}">
                                @error('data_vencimento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="data_pagamento" class="form-label">Data do Pagamento</label>
                                <input type="date" class="form-control" id="data_pagamento" name="data_pagamento"
                                    value="{{ old('data_pagamento') }}">
                                @error('data_pagamento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="valor_cobranca" class="form-label">Valor de Cobrança</label>
                                <input type="number" class="form-control" id="valor_cobranca" name="valor_cobranca"
                                    required value="{{ old('valor_cobranca') }}">
                                @error('valor_cobranca')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="valor_pago" class="form-label">Valor Pago</label>
                                <input type="number" class="form-control" id="valor_pago" name="valor_pago"
                                    value="{{ old('valor_pago') }}">
                                @error('valor_pago')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="multa_juros" class="form-label">Multa e Juros</label>
                                <input type="number" class="form-control" id="multa_juros" name="multa_juros" disabled
                                    value="{{ old('multa_juros') }}">
                                @error('multa_juros')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-6">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required
                                    value="{{ old('descricao') }}">
                                @error('descricao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mb-6">
                                <label for="tipo_despesa" class="form-label">Tipo de Despesa</label>
                                <select class="form-control" name="tipo_despesa" id="tipo_despesa">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['tipo_despesa'] as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_despesa')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="natureza_despesa" class="form-label">Natureza de Despesa</label>
                                <select class="form-control" name="natureza_despesa" id="natureza_despesa">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['natureza_despesa'] as $natureza)
                                        <option value="{{ $natureza->id }}">{{ $natureza->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('natureza_despesa')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="categoria_despesa" class="form-label">Categoria de Despesa</label>
                                <select class="form-control" name="categoria_despesa" id="categoria_despesa">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['categorias_despesa'] as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_despesa')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="situacao" class="form-label">Situação</label>
                                <select class="form-control" name="situacao" id="situacao">
                                    <option value="0">Selecione...</option>
                                    <option value="S">Pago</option>
                                    <option value="N">Não Pago</option>
                                </select>
                                @error('situacao')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="forma_pgto" class="form-label">Forma de Pgto</label>
                                <select class="form-control" name="forma_pgto" id="forma_pgto" required>
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['formas_pgto'] as $forma_pgto)
                                        <option value="{{ $forma_pgto->id }}">{{ $forma_pgto->descricao }}</option>
                                    @endforeach
                                </select>
                                @error('forma_pgto')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-6">
                                <label for="quem_pagou" class="form-label">Quem Pagou</label>
                                <select class="form-control" name="quem_pagou" id="quem_pagou">
                                    <option value="0">Selecione...</option>
                                    @foreach ($dados['vendedores'] as $vendedor)
                                        <option value="{{ $vendedor->id }}">{{ $vendedor->nome }}</option>
                                    @endforeach
                                </select>
                                @error('quem_pagou')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-6">
                                <label for="observacoes" class="form-label">Observações</label>
                                <input type="text" class="form-control" id="observacoes" name="observacoes"
                                    value="{{ old('observacoes') }}">
                                @error('observacoes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('despesas.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </div>
    </div>

</x-layout-app>
