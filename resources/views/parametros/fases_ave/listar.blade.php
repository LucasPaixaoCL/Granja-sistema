<x-layout-app page-title="Fases da Ave [Parâmetros]">

    @php
        $page = 'Fases da Ave [Parâmetros]';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['fases']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('param.fases.ave.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('param.fases.ave.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        <table class="table w-100" id="table" data-order='[[1, "asc"]]'>
                            <thead class="table-light">
                                <th>Descrição</th>
                                <th style="text-align: center" width="120px">Semana Inicial</th>
                                <th style="text-align: center" width="120px">Semana Final</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['fases'] as $fase)
                                    <tr>
                                        <td>{{ $fase->descricao }}</td>
                                        <td style="text-align: center">{{ $fase->semana_inicial }}</td>
                                        <td style="text-align: center">{{ $fase->semana_final }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('param.fases.ave.show', ['id' => Crypt::encryptString($fase->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('param.fases.ave.edit', ['id' => Crypt::encryptString($fase->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('param.fases.ave.confirm', ['id' => Crypt::encryptString($fase->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif

                </div>
                @if (session('error'))
                    <div class="card-footer">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>

</x-layout-app>
