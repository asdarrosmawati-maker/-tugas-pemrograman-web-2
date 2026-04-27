<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('tas.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Merek</label>
            <input type="text" name="merek" class="form-control @error('merek') is-invalid @enderror"
                id="merek" merek="merek">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis</label>
            <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror"
                id="jenis" jenis="jenis">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                id="harga" harga="harga">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                id="stok"stok="stok">
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('tas.index') }}">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</x-app>
