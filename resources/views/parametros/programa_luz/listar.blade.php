<x-layout-app page-title="Programa de Luz [Parâmetros]">

    @php
        $page = 'Programa de Luz [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($results->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('param.programa.luz.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('param.programa.luz.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Nome</th>
                                <th class="text-center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->id }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('parametros.programa_luz.show', ['id' => $result->id]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('parametros.programa_luz.edit', ['id' => $result->id]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('parametros.programa_luz.confirm', ['id' => $result->id]) }}"
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
