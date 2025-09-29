<x-layout-app page-title="Controle de Peso">

    @php
        $page = 'Controle de Peso';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="col-span-12">
        <div class="card">
            {{-- <div class="card-header">
                <h5>{{ $page }}</h5>
            </div> --}}
            <div class="card-body">
                @if ($dados['pesos']->count() === 0)
                    <div class="text-left">
                        <p class="mb-3">Parametrize o Peso de Acordo com a Linhagem Selecionada!</p>
                        <a href="{{ route('param.controle.peso') }}" class="btn btn-primary">Parametrizar</a>
                    </div>
                @else
                    <table class="table w-100" id="table" data-order='[[0, "asc"]]'>
                        <thead class="table-light">
                            <th>Lote</th>
                            <th>Semana</th>
                            <th>Peso Mínimo</th>
                            <th>Peso Máximo</th>
                            <th>Data Prevista</th>
                            <th>Data da Pesagem</th>
                            <th>Peso Real</th>
                            <th style="text-align: center" width="1">Situação</th>
                        </thead>
                        <tbody>
                            @php
                                $total_registros = 0;
                                $peso_normal = 0;
                                $peso_abaixo = 0;
                                $peso_acima = 0;
                            @endphp
                            @foreach ($dados['pesos'] as $peso)
                                <tr>
                                    <td>{{ $peso->num_lote }}</td>
                                    <td>{{ $peso->semana }}</td>
                                    <td>{{ $peso->peso_min ?? '-' }}</td>
                                    <td>{{ $peso->peso_max ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($peso->data_lote)->addDays($peso->semana * 7)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-theme-bg-2 text-white text-[12px] p-1">{{ $peso->data_pesagem ? \Carbon\Carbon::parse($peso->data_pesagem)->format('d/m/Y') : '' }}
                                        </span>
                                        <a href="{{ route('pesos.edit', ['id' => Crypt::encryptString($peso->id)]) }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-theme-bg-2 text-white text-[12px] p-1">{{ $peso->peso_real ?? '' }}
                                        </span>
                                        <a href="{{ route('pesos.edit', ['id' => Crypt::encryptString($peso->id)]) }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($peso->peso_real)
                                            @if ($peso->peso_real < $peso->peso_min)
                                                <i class="fa-regular fa-circle-down text-danger fa-lg"></i>
                                                @php
                                                    $peso_abaixo += 1;
                                                @endphp
                                            @endif
                                            @if ($peso->peso_real > $peso->peso_max)
                                                <i class="fa-regular fa-circle-up text-danger fa-lg"></i>
                                                @php
                                                    $peso_acima += 1;
                                                @endphp
                                            @endif
                                            @if ($peso->peso_real >= $peso->peso_min && $peso->peso_real <= $peso->peso_max)
                                                <i class="fa-regular fa-circle-check text-success fa-lg"></i>
                                                @php
                                                    $peso_normal += 1;
                                                @endphp
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $total_registros += 1;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="card-header">
                <label class="form-label">Registros: </label><span
                    class="btn-outline-dark p-1 mx-2">{{ $total_registros ?? 0 }}</span>

                <label class="form-label">Peso Correto: </label><span
                    class="btn-outline-primary p-1 mx-2">{{ $peso_normal ?? 0 }}</span>

                <label class="form-label">Abaixo do Peso: </label><span
                    class="btn-outline-danger p-1 mx-2">{{ $peso_abaixo ?? 0 }}</span>

                <label class="form-label">Acima do Peso: </label><span
                    class="btn-outline-success p-1 mx-2">{{ $peso_acima ?? 0 }}</span>
            </div>
        </div>
    </div>

</x-layout-app>
