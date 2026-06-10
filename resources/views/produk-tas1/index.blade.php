<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-primary mb-3" href="{{ route('produk-tas.create') }}">Create</a>

    <ul class="list-group">
        @forelse ($datatas as $tas)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $tas->name }} -
                {{ $tas->merek }} -
                {{ $tas->jenis }} -
                {{ $tas->harga }} -
                {{ $tas->stok }} -
                <strong>{{ $tas->keterangan ?? 'keterangan' }}</strong> {{-- field baru --}}

                <a href="{{ route('produk-tas.edit', $tas) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('produk-tas.destroy', $tas) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('ANDA YAKIN?')">Delete</button>
                </form>
            </li>
        @empty
            <li class="list-group-item text-center text-muted">Belum ada data produk tas.</li>
        @endforelse
    </ul>
</x-app>
