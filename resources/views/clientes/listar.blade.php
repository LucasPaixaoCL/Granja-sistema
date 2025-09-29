<x-layout-app page-title="Clientes">

    @php
        $page = 'Clientes';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">

            <div class="card">

                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}

                <div class="card-body">

                    @if ($clientes->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('clientes.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_clientes = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                {{-- <th>Título</th>
                                <th>Link</th> --}}
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nome }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ $cliente->telefone }}</td>
                                        {{-- <td>{{ $cliente->titulo }}</td> --}}
                                        {{-- <td>

                                            @if (!empty($cliente->arquivo) && Storage::disk('public')->exists($cliente->arquivo))
                                                <a href="{{ asset('storage/' . $cliente->arquivo) }}" target="_blank"><i
                                                        class="fa-regular fa-file-pdf fa-2x"
                                                        title="{{ $cliente->arquivo }}"></i></a>
                                            @endif

                                        </td> --}}
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">

                                                <a href="{{ route('clientes.show', ['id' => Crypt::encryptString($cliente->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('clientes.edit', ['id' => Crypt::encryptString($cliente->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('clientes.confirm', ['id' => Crypt::encryptString($cliente->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>

                                            </div>
                                        </td>
                                    </tr>

                                    @php
                                        $total_clientes += 1;
                                    @endphp
                                @endforeach

                            </tbody>

                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tfoot>

                        </table>
                    @endif

                </div>

                <div class="card-header">
                    <label class="form-label">Total de Clientes: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_clientes ?? 0 }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
