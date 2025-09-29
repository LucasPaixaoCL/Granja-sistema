<x-layout-app page-title="Perfil do Usuário">

    @php
        $page = 'Perfil do Usuário';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="col-span-12">
        <div class="card">
            <div class="card-body">
                <x-profile-user-data />
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-6">
            <div class="card">
                <div class="card-header">
                    Dados do Usuário
                </div>
                <div class="card-body">
                    <form action="{{ route('user.profile.update-user-data') }}" method="post">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', auth()->user()->name ?? '') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email (Nome do Usuário)</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', auth()->user()->email ?? '') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-left">
                            <button type="submit" class="btn btn-primary">Alterar</button>
                        </div>

                    </form>

                    @if (session('error_change_data'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error_change_data') }}
                        </div>
                    @endif

                    @if (session('success_change_data'))
                        <div class="alert alert-success mt-3">
                            {{ session('success_change_data') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-6">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <x-profile-user-change-password />
                </div>
            </div>
        </div>
    </div>

</x-layout-app>
