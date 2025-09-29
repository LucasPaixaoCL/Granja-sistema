<x-layout-app page-title="Mortes">

    @php
        $page = 'Mortes';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['mortes']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('mortes.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('mortes.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_mortes = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[1, "desc"], [2, "desc"]]'>
                            <thead class="table-light">
                                <th style="text-align: center" width="1px">Lote</th>
                                <th style="text-align: center" width="1px">Semana</th>
                                <th style="text-align: center" width="1px">Data</th>
                                <th style="text-align: center" width="1px">Qtde Mortes</th>
                                <th>Causa da(s) Morte(s)</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['mortes'] as $morte)
                                    <tr>
                                        <td style="text-align: center" width="1px">{{ $morte->lote->num_lote }}
                                        </td>
                                        <td style="text-align: center" width="1px">{{ $morte->semana }}</td>
                                        <td style="text-align: center" width="1px">
                                            {{ \Carbon\Carbon::parse($morte->data_morte)->format('d/m/Y') }}</td>
                                        <td style="text-align: center" width="1px">{{ $morte->qtde_mortes }}</td>
                                        <td>{{ $morte->lote->causa_mortes }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('mortes.show', ['id' => Crypt::encryptString($morte->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('mortes.edit', ['id' => Crypt::encryptString($morte->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('mortes.confirm', ['id' => Crypt::encryptString($morte->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $total_mortes += $morte->qtde_mortes;
                                    @endphp
                                @endforeach

                            </tbody>

                        </table>

                    @endif

                </div>

                <div class="card-header">
                    <label class="form-label">Mortes: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_mortes ?? 0 }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
