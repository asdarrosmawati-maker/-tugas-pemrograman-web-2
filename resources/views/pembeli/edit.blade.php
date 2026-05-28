<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pembeli.update', $pembeli) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama"
                value="{{ old('nama', $pembeli->nama) }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $pembeli->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp"
                value="{{ old('no_hp', $pembeli->no_hp) }}">
        </div>

        <a href="{{ route('pembeli.index') }}" class="btn btn-primary">Cancel</a>
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</x-app>
