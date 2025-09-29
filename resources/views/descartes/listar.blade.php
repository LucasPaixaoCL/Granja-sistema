<x-layout-app page-title="Descartes">

    @php
        $page = 'Descartes';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}
                @if ($dados['descartes']->count() === 0)
                    <div class="text-left">
                        <p class="mb-3">Nenhum registro encontrado!</p>
                        <a href="{{ route('descartes.create') }}" class="btn btn-primary">Adicionar</a>
                    </div>
                @else
                    <div class="card-body">
                        <div class="text-left">

                            <div class="row">

                                <div class="text-right mb-2">
                                    <a href="{{ route('descartes.create') }}" class="btn btn-primary">Adicionar</a>
                                </div>

                                @php
                                    $total_descartes = 0;
                                @endphp

                                <table class="table w-100" id="table" data-order='[[0, "desc"]]'>
                                    <thead class="table-light">
                                        <th>Data Descarte</th>
                                        <th>Qtde Ovos</th>
                                        <th style="text-align: center" width="1px">Açoes</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($dados['descartes'] as $descarte)
                                            <tr>

                                                <td>{{ \Carbon\Carbon::parse($descarte->data_descarte)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ $descarte->qtde_ovos }}</td>
                                                <td>
                                                    <div class="d-flex gap-2 justify-content-end">

                                                        <a href="{{ route('descartes.show', ['id' => Crypt::encryptString($descarte->id)]) }}"
                                                            class="btn btn-sm"><i class="fa-regular fa-eye"></i></a>
                                                        <a href="{{ route('descartes.edit', ['id' => Crypt::encryptString($descarte->id)]) }}"
                                                            class="btn btn-sm"><i
                                                                class="fa-regular fa-pen-to-square"></i></a>
                                                        <a href="{{ route('descartes.confirm', ['id' => Crypt::encryptString($descarte->id)]) }}"
                                                            class="btn btn-sm"><i
                                                                class="fa-regular fa-trash-can"></i></a>

                                                    </div>
                                                </td>
                                            </tr>

                                            @php
                                                $total_descartes += $descarte->qtde_ovos;
                                            @endphp
                                        @endforeach

                                    </tbody>

                                    <tfoot>
                                        <th></th>
                                        <th>{{ $total_descartes }}</th>
                                        <th></th>
                                    </tfoot>
                                </table>
                @endif

                <div class="card-header">
                    <label class="form-label">Ovos Descartados: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $total_descartes ?? 0 }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
