<x-layout-app page-title="Vendas [Detalhes]">

    @php
        $page = 'Vendas [Detalhes]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">

            <div class="card">

                <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-2 mb-6">
                            <label for="situacao" class="form-label">Quantidade: </label>
                            {{ $dados['venda']->qtde }}
                        </div>

                        <div class="col-md-2 mb-6">
                            <label for="situacao" class="form-label">Valor Unitário: </label>
                            {{ $dados['venda']->valor_unit }}
                        </div>

                        <div class="col-md-2 mb-6">
                            <label for="situacao" class="form-label">Desconto: </label>
                            {{ number_format($dados['venda']->desconto ?? 0, 2, ',', '.') }}
                        </div>

                        <div class="col-md-2 mb-6">
                            <label for="situacao" class="form-label">Subtotal: </label>
                            {{ number_format($dados['venda']->subtotal ?? 0, 2, ',', '.') }}
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-2 mb-6">
                            <label class="form-label">Formato: </label>
                            {{ $dados['venda']->formato->descricao }}
                        </div>

                        <div class="col-md-2 mb-6">
                            <label class="form-label">Cliente: </label>
                            {{ $dados['venda']->cliente->nome }}
                        </div>

                        <div class="col-md-2 mb-6">
                            <label class="form-label">Vendedor: </label>
                            {{ $dados['venda']->funcionario->nome }}
                        </div>

                        <div class="col-md-2 mb-6">
                            <label class="form-label">Forma de Pagamento: </label>
                            {{ $dados['venda']->forma_pgto->descricao }}
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('vendas.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-layout-app>
