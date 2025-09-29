<x-layout-guest page-title="Seja Bem-Vindo(a)!">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">

                <div class="text-center mb-5">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="200px">
                </div>

                <div class="card p-5 text-center">
                    <p>Welcome, <strong>{{ $user->name }}</strong>!</p>
                    <p>Sua foi conta foi criada com sucesso.</p>
                    <p>Você pode acessar a sua conta agora. <a href="{{ route('login') }}">Clique aqui</a></p>
                </div>

            </div>
        </div>
    </div>

</x-layout-gues>
