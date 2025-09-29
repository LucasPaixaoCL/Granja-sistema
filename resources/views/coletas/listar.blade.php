<x-layout-app page-title="Coletas">

    @php
        $page = 'Coletas';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['coletas']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('coletas.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('coletas.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_ovos = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[2, "desc"]]'>

                            <thead class="table-light">
                                <th>Lote</th>
                                <th>Semana</th>
                                <th>Data da Coleta</th>
                                <th>Qtde Ovos</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>

                            <tbody>

                                @foreach ($dados['coletas'] as $coleta)
                                    <tr>
                                        <td>{{ $coleta->lote->num_lote }}</td>
                                        <td>{{ $coleta->semana }}</td>
                                        <td>{{ \Carbon\Carbon::parse($coleta->data_coleta)->format('d/m/Y') }}</td>
                                        <td>{{ $coleta->qtde_ovos }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('coletas.show', ['id' => Crypt::encryptString($coleta->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('coletas.edit', ['id' => Crypt::encryptString($coleta->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('coletas.confirm', ['id' => Crypt::encryptString($coleta->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $total_ovos += $coleta->qtde_ovos;
                                    @endphp
                                @endforeach

                            </tbody>

                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>{{ $total_ovos }}</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </tfoot>

                        </table>
                    @endif

                </div>

                <div class="card-header">
                    <label class="form-label">Ovos Produzidos: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_ovos ?? 0 }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
