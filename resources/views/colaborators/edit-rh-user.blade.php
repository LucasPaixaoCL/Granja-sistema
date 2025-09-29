<x-layout-app page-title="Edit RH User">

    <div class="w-100 p-4">

        <h3>Editar Colaborador</h3>

        <hr>

        <form action="{{ route('colaborators.rh.uptate-colaborator') }}" method="post">

            @csrf

            <div class="d-flex gap-5">
                <p>Nome: <strong>{{ $colaborator->name }}</strong></p>
                <p>E-mail: <strong>{{ $colaborator->email }}</strong></p>
            </div>
            <hr>

            <input type="hidden" name="user_id" value="{{ $colaborator->id }}">

            <div class="container-fluid">

                <div class="row w-50 gap-3">

                    {{-- user details --}}
                    <div class="col border border-gray p-4">

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="salary" class="form-label">Salário</label>
                                    <input type="number" class="form-control" id="salary" name="salary"
                                        step=".01" placeholder="0,00"
                                        value="{{ old('salary', $colaborator->detail->salary) }}">
                                    @error('salary')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="admission_date" class="form-label">Data de Admissão</label>
                                    <input type="date" class="form-control" id="admission_date" name="admission_date"
                                        placeholder="YYYY-mm-dd"
                                        value="{{ old('admission_date', $colaborator->detail->admission_date) }}">
                                    @error('admission_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{ route('colaborators.rh-users') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>

            </div>

        </form>

    </div>

</x-layout-app>
