<x-layout-app page-title="Núcleos">

    @php
        $page = 'Núcleos';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">

                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}

                <div class="card-body">
                    @if ($dados['nucleos']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('nucleos.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('nucleos.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_nucleos = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Núcleos</th>
                                <th>Área Total (m2)</th>
                                <th>Situação</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>
                                @foreach ($dados['nucleos'] as $nucleo)
                                    <tr>
                                        <td>{{ $nucleo->descricao }}</td>
                                        <td>{{ number_format($nucleo->area_total, 0, ',', '.') }}</td>
                                        <td>{{ $nucleo->situacao == 1 ? 'Ativo' : 'Inativo' }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('nucleos.show', ['id' => Crypt::encryptString($nucleo->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('nucleos.edit', ['id' => Crypt::encryptString($nucleo->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('nucleos.confirm', ['id' => Crypt::encryptString($nucleo->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $total_nucleos += 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <div class="card-header">
                    <label class="form-label">Total de Núcleos: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_nucleos ?? 0 }}</span>
                </div>

            </div>
        </div>
    </div>

</x-layout-app>
