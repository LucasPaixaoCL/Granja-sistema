<x-layout-app page-title="Fornecedores">

    @php
        $page = 'Fornecedores';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">

                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}

                <div class="card-body">

                    @if ($fornecedores->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('fornecedores.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('fornecedores.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_fornecedores = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th class="text-center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($fornecedores as $fornecedor)
                                    <tr>
                                        <td>{{ $fornecedor->nome }}</td>
                                        <td>{{ $fornecedor->email }}</td>
                                        <td>{{ $fornecedor->telefone }}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">
                                                {{-- 1_administrador e 2_rh --}}

                                                <a href="{{ route('fornecedores.show', ['id' => Crypt::encryptString($fornecedor->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('fornecedores.edit', ['id' => Crypt::encryptString($fornecedor->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('fornecedores.confirm', ['id' => Crypt::encryptString($fornecedor->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $total_fornecedores += 1;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                    @endif

                </div>

                <div class="card-header">
                    <label class="form-label">Total de Fornecedores: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_fornecedores ?? 0 }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
