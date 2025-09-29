<x-layout-app page-title="Detalhe Programa de Vacinação [Parâmetros]">
    @php
        $page = 'Detalhe Programa de Vacinação [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        @if ($dados['detalhe_programa_vacinacao']->count() !== 0)
                            @foreach ($dados['detalhe_programa_vacinacao'] as $detalhe)
                                <div>Programa de Vacinação: {{ $detalhe->programa->descricao }}</div>
                            @endforeach
                        @endif
                    </h5>
                </div>
                <div class="card-body">

                    @if ($dados['detalhe_programa_vacinacao']->count() === 0)
                        <div class="text-left my-5">
                            <p class="mb-5">Nenhum registro encontrado!</p>
                            <a href="{{ route('param.detalhe.programa.vacinacao.create') }}"
                                class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="mb-3">
                            <a href="{{ route('param.detalhe.programa.vacinacao.create') }}"
                                class="btn btn-primary">Adicionar</a>
                        </div>

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Dia</th>
                                <th>Semana</th>
                                <th>Enfermidade</th>
                                <th>Via de Aplicação</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['detalhe_programa_vacinacao'] as $detalhe)
                                    <tr>
                                        <td>{{ $detalhe->dia }}</td>
                                        <td>{{ $detalhe->semana }}</td>
                                        <td>{{ $detalhe->enfermidade }}</td>
                                        <td>{{ $detalhe->via_aplicacao->descricao }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('param.detalhe.programa.vacinacao.show', ['id' => Crypt::encryptString($detalhe->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('param.detalhe.programa.vacinacao.edit', ['id' => Crypt::encryptString($detalhe->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('param.detalhe.programa.vacinacao.confirm', ['id' => Crypt::encryptString($detalhe->id)]) }}"
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
