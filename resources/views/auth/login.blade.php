<x-layout-guest page-title="Login">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4">

                <div class="text-center mt-5 mb-5">
                    <img src="{{ asset('assets/images/logo_avigest_dark.png') }}" alt="Logo" width="250px">
                </div>

                <div class="card p-5">

                    <form action="{{ route('login') }}" method="post">

                        @csrf

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('password.request') }}">Esqueceu a sua senha?</a>
                            <button type="submit" class="btn btn-primary px-4">Entrar</button>
                        </div>

                    </form>

                    @if (session('status'))
                        {{-- apresenta a mensagem de sucesso na alteracao da senha --}}
                        <div class="alert alert-success mt-3 text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>

</x-layout-guest>
