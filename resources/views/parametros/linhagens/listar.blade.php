<x-layout-app page-title="Linhagens [Parâmetros]">

    @php
        $page = 'Linhagens [Parâmetros]';
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
                            <a href="{{ route('param.linhagens.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('param.linhagens.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Linhagem</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->descricao }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('param.linhagens.show', ['id' => Crypt::encryptString($result->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('param.linhagens.edit', ['id' => Crypt::encryptString($result->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('param.linhagens.confirm', ['id' => Crypt::encryptString($result->id)]) }}"
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
