<x-layout-app page-title="Descartes">

    @php
        $page = 'Descartes';
    @endphp

    <x-breadcrumb :page=$page />

    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-6">
            <div class="card">
                <div class="card-header">
                    <h5>Adicionar {{ $page }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('descartes.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="data_descarte" class="form-label">Data do Descarte</label>
                                <input type="date" class="form-control" id="data_descarte" name="data_descarte"
                                    required value="{{ old('data_descarte', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                                @error('data_descarte')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="qtde_ovos" class="form-label">Qtde Ovos</label>
                                <input type="number" class="form-control" id="qtde_ovos" name="qtde_ovos" required
                                    value="{{ old('qtde_ovos') }}">
                                @error('qtde_ovos')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('descartes.index') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </div>
    </div>

</x-layout-app>
