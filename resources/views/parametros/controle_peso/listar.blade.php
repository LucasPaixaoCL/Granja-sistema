<x-layout-app page-title="Controle de Peso [Parâmetros]">

    @php
        $page = 'Controle de Peso [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['controle_peso']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('param.controle.peso.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('param.controle.peso.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-ligth">
                                <th style="text-align: center" width="1px">Linhagem</th>
                                <th style="text-align: center" width="1px">Semana</th>
                                <th>Peso Mínimo</th>
                                <th>Peso Máximo</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['controle_peso'] as $controle)
                                    <tr>
                                        <td></td>
                                        <td>{{ $controle->semana }}</td>
                                        <td>{{ $controle->peso_min }}</td>
                                        <td>{{ $controle->peso_max }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('param.controle.peso.show', ['id' => Crypt::encryptString($controle->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('param.controle.peso.edit', ['id' => Crypt::encryptString($controle->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('param.controle.peso.confirm', ['id' => Crypt::encryptString($controle->id)]) }}"
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
