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

                <form action="{{ route('produk-tas.restore', $tas) }}" method="POST" class="d-inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('ANDA YAKIN ingin mengembalikan data ini?')">Restore</button>
                </form>
            </li>
        @empty
            <li class="list-group-item text-center text-muted">Belum ada data produk tas.</li>
        @endforelse
    </ul>
</x-app>
