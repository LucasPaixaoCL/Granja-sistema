<x-layout-app page-title="Lotes">

    @php
        $page = 'Lotes';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="col-span-12">
        <div class="card">
            {{-- <div class="card-header">
                <h5>{{ $page }}</h5>
            </div> --}}
            <div class="card-body">
                @if ($dados['lotes']->count() === 0)
                    <div class="text-left">
                        <p class="mb-3">Nenhum registro encontrado!</p>
                        <a href="{{ route('lotes.create') }}" class="btn btn-primary">Adicionar</a>
                    </div>
                @else
                    <div class="text-right mb-2">
                        <a href="{{ route('lotes.create') }}" class="btn btn-primary">Adicionar</a>
                    </div>
                    <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                        <thead class="table-light">
                            <th>Núcleo</th>
                            <th>Lote</th>
                            <th>Galpão</th>
                            <th>Data Lote</th>
                            <th>Semana</th>
                            <th>Qtde Aves</th>
                            <th>Qtde Machos</th>
                            <th>Mortes</th>
                            <th>Total de Aves</th>
                            <th style="text-align: center" width="1px">Açoes</th>
                        </thead>
                        <tbody>
                            @php
                                $total_aves = 0;
                                $total_machos = 0;
                                $total_mortes = 0;
                                $total_atual_aves = 0;
                            @endphp
                            @foreach ($dados['lotes'] as $lote)
                                <tr>
                                    @php
                                        $dataInicial = \Carbon\Carbon::parse($lote->data_lote);
                                        $dataAtual = \Carbon\Carbon::now();
                                        $qtde_semanas = (int) $dataInicial->diffInWeeks($dataAtual);
                                        $qtde_atual_aves =
                                            $lote->qtde_aves - $lote->qtde_machos - $lote->mortes->sum('qtde_mortes');
                                    @endphp
                                    <td>{{ $lote->nucleo->descricao }}</td>
                                    <td>{{ $lote->num_lote }}</td>
                                    <td></td>
                                    {{-- <td>{{ $lote->galpoes->descricao }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($lote->data_lote)->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-theme-bg-2 text-white text-[12px] p-1">{{ $qtde_semanas }}
                                        </span>
                                    </td>
                                    <td>{{ $lote->qtde_aves }}</td>
                                    <td>{{ $lote->qtde_machos }}</td>
                                    <td>{{ $lote->mortes->sum('qtde_mortes') }}</td>
                                    <td>{{ $qtde_atual_aves }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-end">

                                            <a href="{{ route('lotes.show', ['id' => Crypt::encryptString($lote->id)]) }}"
                                                class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                            <a href="{{ route('lotes.edit', ['id' => Crypt::encryptString($lote->id)]) }}"
                                                class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="{{ route('lotes.confirm', ['id' => Crypt::encryptString($lote->id)]) }}"
                                                class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $total_aves += $lote->qtde_aves;
                                    $total_machos += $lote->qtde_machos;
                                    $total_mortes += $lote->mortes->sum('qtde_mortes');
                                    $total_atual_aves = $total_aves - $total_machos - $total_mortes;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-header">
                <label class="form-label">Aves (Inicial): </label><span
                    class="btn-outline-primary p-1 mx-2">{{ $dados['total_aves'] ?? 0 }}</span>
                <label class="form-label">Aves (Atual): </label><span
                    class="btn-outline-secondary p-1 mx-2">{{ $dados['total_aves'] - $dados['total_machos'] - $dados['total_mortes'] }}</span>
                <label class="form-label">Mortes: </label><span
                    class="btn-outline-danger p-1 mx-2">{{ $dados['total_mortes'] ?? 0 }}</span>
                <label class="form-label">Machos: </label><span
                    class="btn-outline-dark p-1 mx-2">{{ $dados['total_machos'] ?? 0 }}</span>
            </div>
        </div>
    </div>

</x-layout-app>
