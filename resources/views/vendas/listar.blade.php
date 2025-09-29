<x-layout-app page-title="Vendas">

    @php
        $page = 'Vendas';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['vendas']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('vendas.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('vendas.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_vendas = 0;
                            $total_pagas = 0;
                            $total_nao_pagas = 0;
                            $total_ovos_comercializados = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Data da Venda</th>
                                <th>Formato</th>
                                <th>Qtde</th>
                                <th>Valor Unit.</th>
                                <th>Desconto</th>
                                <th>Subtotal</th>
                                <th>Forma Pgto</th>
                                <th>Situação</th>
                                <th>Qtde Ovos</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['vendas'] as $venda)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</td>
                                        <td>{{ $venda->formato?->descricao ?? '-' }}</td>
                                        <td>{{ $venda->qtde }}</td>
                                        <td>{{ $venda->valor_unit }}</td>
                                        <td>{{ number_format($venda->desconto ?? 0, 2, ',', '.') }}</td>
                                        <td>{{ number_format($venda->subtotal ?? 0, 2, ',', '.') }}</td>
                                        <td>{{ $venda->forma_pgto?->descricao ?? '-' }}</td>
                                        <td>{{ $venda->situacao?->descricao ?? '' }}</td>
                                        <td>{{ $venda->qtde_ovos }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('vendas.show', ['id' => Crypt::encryptString($venda->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('vendas.edit', ['id' => Crypt::encryptString($venda->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('vendas.confirm', ['id' => Crypt::encryptString($venda->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $total_vendas += $venda->subtotal;
                                        $total_ovos_comercializados += $venda->qtde_ovos;
                                    @endphp

                                    @if ($venda->situacao->descricao === 'Pago')
                                        @php $total_pagas += $venda->subtotal; @endphp
                                    @else
                                        @php $total_nao_pagas += $venda->subtotal; @endphp
                                    @endif
                                @endforeach

                            </tbody>

                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>{{ number_format($total_vendas ?? 0, 2, ',', '.') }}</th>
                                <th></th>
                                <th></th>
                                <th>{{ $total_ovos_comercializados }}</th>
                            </tfoot>
                        </table>
                    @endif

                </div>
                <div class="card-footer">
                    <label class="form-label">Total Vendido: </label><span class="btn-outline-dark p-1 mx-2">R$
                        {{ number_format($total_vendas ?? 0, 2, ',', '.') }}</span>
                    <label class="form-label">Pago: </label><span class="btn-outline-primary p-1 mx-2">R$
                        {{ number_format($total_pagas ?? 0, 2, ',', '.') }}</span>
                    <label class="form-label">Não Pago: </label><span class="btn-outline-danger p-1 mx-2">R$
                        {{ number_format($total_nao_pagas ?? 0, 2, ',', '.') }}</span>
                    <label class="form-label">Ovos Comercializados: </label><span class="btn-outline-danger p-1 mx-2">
                        {{ $total_ovos_comercializados ?? 0 }}</span>
                </div>
            </div>
        </div>

    </div>

</x-layout-app>
