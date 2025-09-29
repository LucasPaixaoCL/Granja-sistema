<x-layout-app page-title="Funcionários">

    @php
        $page = 'Funcionários';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['funcionarios']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('funcionarios.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_funcionarios = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Funcionários</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th class="text-center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['funcionarios'] as $funcionario)
                                    <tr>
                                        <td>{{ $funcionario->nome }}</td>
                                        <td>{{ $funcionario->email }}</td>
                                        <td>{{ $funcionario->telefone }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">
                                                {{-- 1_administrador e 2_rh --}}

                                                <a href="{{ route('funcionarios.show', ['id' => Crypt::encryptString($funcionario->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('funcionarios.edit', ['id' => Crypt::encryptString($funcionario->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('funcionarios.confirm', ['id' => Crypt::encryptString($funcionario->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $total_funcionarios += 1;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    @endif

                </div>
                <div class="card-header">
                    <label class="form-label">Total de Funcionários: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_funcionarios ?? 0 }}</span>
                </div>
            </div>
        </div>

    </div>

</x-layout-app>
