<x-layout-app page-title="Galpões">

    @php
        $page = 'Galpões';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                <div class="card-body">

                    @if ($dados['galpoes']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Nenhum registro encontrado!</p>
                            <a href="{{ route('galpoes.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>
                    @else
                        <div class="text-right mb-2">
                            <a href="{{ route('galpoes.create') }}" class="btn btn-primary">Adicionar</a>
                        </div>

                        @php
                            $total_galpoes = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Descrição</th>
                                <th>Largura (m)</th>
                                <th>Comprimento (m)</th>
                                <th>Área (m2)</th>
                                <th>Densidade</th>
                                <th>Total de Aves</th>
                                <th style="text-align: center" width="1px">Açoes</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['galpoes'] as $galpao)
                                    <tr>
                                        <td>{{ $galpao->descricao }}</td>
                                        <td>{{ number_format($galpao->largura, 1, ',', '') }}
                                        <td>{{ number_format($galpao->comprimento, 1, ',', '') }}
                                        <td>{{ number_format($galpao->largura * $galpao->comprimento, 1, ',', '') }}
                                        </td>
                                        <td>{{ $galpao->densidade }} (aves por m2)</td>
                                        <td>{{ number_format($galpao->largura * $galpao->comprimento * $galpao->densidade, 1, ',', '') }}
                                        <td>
                                            <div class="d-flex gap-2 justify-content-end">
                                                <a href="{{ route('galpoes.show', ['id' => Crypt::encryptString($galpao->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                <a href="{{ route('galpoes.edit', ['id' => Crypt::encryptString($galpao->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('galpoes.confirm', ['id' => Crypt::encryptString($galpao->id)]) }}"
                                                    class="btn btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $total_galpoes += 1;
                                    @endphp
                                @endforeach

                            </tbody>

                        </table>
                    @endif

                </div>

                <div class="card-footer">
                    <label class="form-label">Galpões: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_galpoes ?? 0 }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
