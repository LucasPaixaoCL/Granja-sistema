<x-layout-app page-title="Vacinas">

    @php
        $page = 'Vacinas';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">

        <div class="col-span-12">

            <div class="card">

                {{-- <div class="card-header">
                    <h5>{{ $page }}</h5>
                </div> --}}

                <div class="card-body">

                    @if ($dados['vacinas']->count() === 0)
                        <div class="text-left">
                            <p class="mb-3">Parametrize o Peso de Acordo com a Linhagem Selecionada!</p>
                            <a href="{{ route('param.vacina.peso') }}" class="btn btn-primary">Parametrizar</a>
                        </div>
                    @else
                        @php
                            $vacinas_aplicadas = 0;
                            $vacinas_a_vencer = 0;
                            $vacinas_vencidas = 0;
                        @endphp

                        <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                            <thead class="table-light">
                                <th>Dia</th>
                                <th>Semana</th>
                                <th>Enfermidade</th>
                                <th>Via de Aplicação</th>
                                <th>Data Prevista</th>
                                <th>Data Realizada</th>
                            </thead>
                            <tbody>

                                @foreach ($dados['vacinas'] as $vacina)
                                    <tr>
                                        <td>{{ $vacina->dia }}</td>
                                        <td>{{ $vacina->semana }}</td>
                                        <td>{{ $vacina->enfermidade }}</td>
                                        <td>{{ $vacina->descricao }}</td>
                                        <td>{{ $vacina->data_prevista ? \Carbon\Carbon::parse($vacina->data_prevista)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td>
                                            <span class="badge bg-theme-bg-2 text-white text-[12px] p-1">
                                                {{ $vacina->data_realizada ? \Carbon\Carbon::parse($vacina->data_realizada)->format('d/m/Y') : '' }}
                                            </span>
                                            &nbsp;
                                            <a
                                                href="{{ route('vacinas.edit', ['id' => Crypt::encryptString($vacina->id)]) }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @php
                                        if (!$vacina->data_realizada) {
                                            if ($vacina->data_prevista < now()) {
                                                $vacinas_vencidas += 1;
                                            } else {
                                                $vacinas_a_vencer += 1;
                                            }
                                        } else {
                                            $vacinas_aplicadas += 1;
                                        }
                                    @endphp
                                @endforeach

                            </tbody>

                            <tfoot>
                                <th></th>
                                <th></th>
                            </tfoot>

                        </table>
                    @endif

                </div>

                <div class="card-header">
                    <label class="form-label">Total: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $vacinas_aplicadas + $vacinas_vencidas ?? 0 }}</span>
                    <label class="form-label">Aplicadas: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $vacinas_aplicadas ?? 0 }}</span>
                    <label class="form-label">A Vencer: </label><span
                        class="btn-outline-primary p-1 mx-2">{{ $vacinas_a_vencer ?? 0 }}</span>
                    <label class="form-label">Vencidas: </label><span
                        class="btn-outline-danger p-1 mx-2">{{ $vacinas_vencidas ?? 0 }}</span>
                </div>

            </div>
        </div>

    </div>

</x-layout-app>
