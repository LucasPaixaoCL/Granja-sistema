<div class="col-12">
    <div class="p-5 shadow-sm">
        <form action="{{ route('user.profile.update-password') }}" method="post">

            @csrf

            <div class="mb-3 mt-4">
                <label for="current_password" class="form-label">Senha Atual</label>
                <input type="password" name="current_password" id="current_password" class="form-control"
                    value="{{ old('current_password') }}">
                @error('current_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">Nova Senha</label>
                <input type="password" name="new_password" id="new_password" class="form-control"
                    value="{{ old('new_password') }}">
                @error('new_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirmar</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="form-control" value="{{ old('new_password_confirmation') }}">
                @error('new_password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Alterar</button>
            </div>

        </form>

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

    </div>
</div>
