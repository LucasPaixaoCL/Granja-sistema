<x-layout-app page-title="Departamentos">

    <div class="w-25 p-4">

        <h3>Edtiar Departamento</h3>

        <hr>

        <form action="{{ route('departments.uptate-department') }}" method="post">

            @csrf

            <input type="hidden" name="id" value="{{ $department->id }}"> {{-- deve ser encriptado --}}

            <div class="mb-3">
                <label for="name" class="form-label">Nome do Departamento</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $department->name) }}">
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <a href="{{ route('departments') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>

        </form>

    </div>

</x-layout-app>
