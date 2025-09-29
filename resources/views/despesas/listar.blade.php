<x-layout-app page-title="Despesas">

    @php
        $page = 'Despesas';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">

                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}

                <div class="card-body">

                    @if ($dados['despesas']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('despesas.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('despesas.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_despesas = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Dt. Vencimento</th>
                                <th>Dt. Pagamento</th>
                                <th>Vlr Cobrança</th>
                                <th>Descrição</th>
                                <th>Situação</th>
                                <th>Forma de Pgto</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['despesas'] as $despesa)
                                    <tr>
                                        <td>{{ $despesa->data_vencimento ? \Carbon\Carbon::parse($despesa->data_vencimento)->format('d/m/Y') : '' }}
                                        </td>
                                        <td>{{ $despesa->data_pagamento ? \Carbon\Carbon::parse($despesa->data_pagamento)->format('d/m/Y') : '' }}
                                        </td>
                                        <td>{{ $despesa->vlr_cobranca }}</td>
                                        <td>{{ $despesa->descricao }}</td>
                                        <td>{{ $despesa->situacao !== 0 ? $despesa->situacao : '-' }}</td>
                                        <td>{{ $despesa->forma_pgto !== 0 ? $despesa->forma_pgto : '-' }}</td>

                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('despesas.show', ['id' => Crypt::encryptString($despesa->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('despesas.edit', ['id' => Crypt::encryptString($despesa->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('despesas.confirm', ['id' => Crypt::encryptString($despesa->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $total_despesas += $despesa->vlr_cobranca;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    @endif

                </div>

                <div class="card-footer">
                    <label class="form-label">Total das Despesas: </label><span class="btn-outline-dark p-1 mx-2">R$
                        {{ number_format($total_despesas ?? 0, 2, ',', '.') }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
