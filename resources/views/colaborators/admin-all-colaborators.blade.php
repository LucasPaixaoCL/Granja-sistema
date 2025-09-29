<x-layout-app page-title="Colaborators">

    <div class="w-100 p-4">

        <h3>Colaboradores</h3>

        <hr>

        @if ($colaborators->count() === 0)
            <p>Nenhum colaborador encontrado!</p>
        @else
            <table class="table" id="table">
                <thead class="table-dark">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Departamento</th>
                    <th>Role</th>
                    <th>Dt. Admissão</th>
                    <th></th>
                </thead>
                <tbody>

                    @foreach ($colaborators as $colaborator)
                        <tr>
                            <td>{{ $colaborator->name }}</td>
                            <td>{{ $colaborator->email }}</td>
                            <td>
                                @empty($colaborator->email_verified_at)
                                    <span class="badge bg-danger">Inativo</span>
                                @else
                                    <span class="badge bg-success">Ativo</span>
                                @endempty
                            </td>
                            <td>{{ $colaborator->department->name }}</td>
                            <td>{{ $colaborator->role }}</td>
                            <td>{{ \Carbon\Carbon::parse($colaborator->detail->admission_date)->format('d/m/Y') }}</td>

                            <td>
                                <div class="d-flex gap-3 justify-content-end">

                                    @if ($colaborator->id === 1)
                                        {{-- 1 é o administrador --}}
                                        <i class="fa-solid fa-lock"></i>
                                    @else
                                        <a href="{{ route('colaborators.details', ['id' => $colaborator->id]) }}" class="btn btn-sm btn-outline-dark"><i class="fas fa-eye me-2"></i>Detalhes</a>
                                        <a href="{{ route('colaborators.delete', ['id' => $colaborator->id])}}" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-trash-can me-2"></i>Excluir</a>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif

</x-layout-app>
