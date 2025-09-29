<x-layout-app page-title="Fornecedores">

    @php
        $page = 'Fornecedores';
    @endphp

    <x-breadcrumb :page=$page />

    <form action="{{ route('fornecedores.store') }}" method="post">
        @csrf

        <div class="grid grid-cols-12 gap-x-6">

            <div class="col-span-6">

                <div class="card">

                    <div class="card-header">
                        <h5>Adicionar {{ $page }}</h5>
                    </div>

                    <div class="card-body">

                        <div class="col-md-12 mb-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required
                                value="{{ old('nome') }}">
                            @error('nome')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-6">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone"
                                    value="{{ old('telefone') }}">
                                @error('telefone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('fornecedores.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Gravar</button>
                    </div>

                </div>
            </div>
        </div>

    </form>

</x-layout-app>
