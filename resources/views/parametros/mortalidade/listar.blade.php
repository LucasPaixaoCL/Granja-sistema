<x-layout-app page-title="Mortalidade [Parâmetros]">

    @php
        $page = 'Mortalidade [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
            <div class="card">

                <div class="card-body">
                    @if ($param_mortalidade->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('param.mortalidade.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('param.mortalidade.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th class="text-center" width="90px">Semana</th>
                                <th>Padrão</th>
                                <th class="text-center" width="1px">Açoes</th>
                            </thead>
                            <tbody>
                                @foreach ($param_mortalidade as $param)
                                    <tr>
                                        <td class="text-center">{{ $param->semana }}</td>
                                        <td>{{ $param->padrao }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('param.mortalidade.show', ['id' => Crypt::encryptString($param->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('param.mortalidade.edit', ['id' => Crypt::encryptString($param->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('param.mortalidade.confirm', ['id' => Crypt::encryptString($param->id)]) }}"
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
