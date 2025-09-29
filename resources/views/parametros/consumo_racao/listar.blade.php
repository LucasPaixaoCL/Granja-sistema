<x-layout-app page-title="Consumo de Ração [Parâmetros]">

    @php
        $page = 'Consumo de Ração [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($consumo_racao->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('param.consumo.racao.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('param.consumo.racao.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Semana</th>
                                <th>Consumo Dia</th>
                                <th>Consumo Semana</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($consumo_racao as $consumo)
                                    <tr>
                                        <td>{{ $consumo->semana }}</td>
                                        <td>{{ $consumo->consumo_dia }}</td>
                                        <td>{{ $consumo->consumo_semana }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('param.consumo.racao.show', ['id' => Crypt::encryptString($consumo->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('param.consumo.racao.edit', ['id' => Crypt::encryptString($consumo->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('param.consumo.racao.confirm', ['id' => Crypt::encryptString($consumo->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>

    </div>

</x-layout-app>
