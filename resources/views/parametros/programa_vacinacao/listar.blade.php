<x-layout-app page-title="Programa de Vacinação [Parâmetros]">

    @php
        $page = 'Programa de Vacinação [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['programa_vacinacao']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('param.programa.vacinacao.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('param.programa.vacinacao.create') }}"
                                class="btn btn-primary">Adicionar</a>
                        </div>

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th style="text-align: center" width="1px">ID</th>
                                <th>Descrição</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['programa_vacinacao'] as $programa)
                                    <tr>
                                        <td style="text-align: center">{{ $programa->id }}</td>
                                        <td><a
                                                href="{{ route('param.detalhe.programa.vacinacao.index') }}">{{ $programa->descricao }}</a>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('param.programa.vacinacao.show', ['id' => Crypt::encryptString($programa->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('param.programa.vacinacao.edit', ['id' => Crypt::encryptString($programa->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('param.programa.vacinacao.confirm', ['id' => Crypt::encryptString($programa->id)]) }}"
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
