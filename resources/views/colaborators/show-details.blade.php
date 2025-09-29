<x-layout-app page-title="Detalhes do Colaborador">

    <div class="w-100 p-4">

        <h3>Detalhes do Colaborador</h3>

        <hr>

        <div class="container-fluid">
            <div class="row mb-3">

                <div class="col">

                    <p>Nome: <strong>{{ $colaborator->name }}</strong></p>
                    <p>E-mail: <strong>{{ $colaborator->email }}</strong></p>
                    <p>Role: <strong>{{ $colaborator->role }}</strong></p>
                    <p>Permissões: </p>

                    @php
                        $permissions = json_decode($colaborator->permissions);
                    @endphp

                    <ul>
                        @foreach ($permissions as $permission)
                            <li>{{ $permission }}</li>
                        @endforeach
                    </ul>

                    <p>Departamento: <strong>{{ $colaborator->department->name }}</strong></p>
                    <p>Status:

                        @empty($colaborator->email_verified_at)
                            <span class="badge bg-danger">Inativo</span>
                        @else
                            <span class="badge bg-success">Ativo</span>
                        @endempty

                    </p>
                </div>

                <div class="col">
                    <p>Endereço: <strong>{{ $colaborator->detail->address }}</strong></p>
                    <p>CEP: <strong>{{ $colaborator->detail->zip_code }}</strong></p>
                    <p>Cidade: <strong>{{ $colaborator->detail->city }}</strong></p>
                    <p>Telefone: <strong>{{ $colaborator->detail->phone }}</strong></p>
                    <p>Data de Admissão: <strong>{{ $colaborator->detail->admission_date }}</strong></p>
                    <p>Salário: <strong>{{ $colaborator->detail->salary }}</strong></p>
                </div>
            </div>
        </div>

        <button class="btn btn-outline-dark" onclick="window.history.back()"><i class="fas fa-arrow-left me-2"></i>Voltar</button>

    </div>

</x-layout-app>
