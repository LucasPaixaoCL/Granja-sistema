<x-layout-app page-title="Departamentos">

    <div class="w-100 p-4">

        <h3>Departamentos</h3>

        <hr>

        @if ($departments->count() === 0)
            <div class="text-center my-5">
                <p>Nenhum departamento encontrado!</p>
                <a href="{{ route('departments.new-department') }}" class="btn btn-primary">Novo Departamento</a>
            </div>
        @else
            <div class="mb-3">
                <a href="{{ route('departments.new-department') }}" class="btn btn-primary">Novo Departamento</a>
            </div>

            <table class="table w-100" id="table">
                <thead class="table-dark">
                    <th>Departamentos</th>
                    <th></th>
                </thead>
                <tbody>

                    @foreach ($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>
                                <div class="d-flex gap-3 justify-content-end">
                                    {{-- 1_administrador e 2_rh --}}
                                    @if (in_array($department->id, [1, 2]))
                                        <i class="fa-solid fa-lock"></i>
                                    @else
                                        <a href="{{ route('departments.edit-department', ['id' => $department->id]) }}"
                                            class="btn btn-sm btn-outline-dark"><i
                                                class="fa-regular fa-pen-to-square me-2"></i>Editar</a>
                                        <a href="{{ route('departments.delete-department', ['id' => $department->id]) }}"
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
