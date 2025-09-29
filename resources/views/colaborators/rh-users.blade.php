<x-layout-app page-title="Recursos Humanos">

    <div class="w-100 p-4">

        <h3>Colaboradores (RH)</h3>

        <hr>

    @if ($colaborators->count() === 0)
        <p>Nenhum colaborador encontrado!</p>
        <a href="{{ route('colaborators.rh.new-colaborator') }}" class="btn btn-primary">Novo Colaborador</a>
    @else
        <div class="mb-3">
            <a href="{{ route('colaborators.rh.new-colaborator') }}" class="btn btn-primary">Novo Colaborador</a>
        </div>

        <table class="table" id="table">
            <thead class="table-dark">
                <th>Nome</th>
                <th>Email</th>
                <th>Role</th>
                <th>Permissões</th>
                <th>Dt. Admissão</th>
                <th>Cidade</th>
                <th>Salário</th>
                <th></th>
            </thead>
            <tbody>

                @foreach ($colaborators as $colaborator)
                    <tr>
                        <td>{{ $colaborator->name }}</td>
                        <td>{{ $colaborator->email }}</td>
                        <td>{{ $colaborator->role }}</td>

                        @php
                            $permissions = json_decode($colaborator->permissions);
                        @endphp

                        <td>{{ implode(',', $permissions) }}</td>

                        <td>{{ \Carbon\Carbon::parse($colaborator->detail->admission_date)->format('d/m/Y') }}</td>
                        <td>{{ $colaborator->detail->city }}</td>
                        <td>{{ $colaborator->detail->salary }}</td>

                        <td>
                            <div class="d-flex gap-3 justify-content-end">

                                @if ($colaborator->id === 1)
                                    {{-- 1 é o administrador --}}
                                    <i class="fa-solid fa-lock"></i>
                                @else
                                    <a href="{{ route('colaborators.rh.edit-colaborator', ['id' => $colaborator->id]) }}"
                                        class="btn btn-sm btn-outline-dark"><i
                                            class="fa-regular fa-pen-to-square me-2"></i>Editar</a>
                                    <a href="{{ route('colaborators.rh.delete-colaborator', ['id' => $colaborator->id]) }}"
                                        class="btn btn-sm btn-outline-dark"><i
                                            class="fa-regular fa-trash-can me-2"></i>Excluir</a>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif

    </div>

</x-layout-app>
