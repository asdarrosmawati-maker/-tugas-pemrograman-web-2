<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a class="btn btn-secondary mb-3" href="{{ route('produk-tas.index') }}">Kembali ke Index</a>

    <ul class="list-group">
        @forelse ($datatas as $tas)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $tas->name }} -
                {{ $tas->merek }} -
                {{ $tas->jenis }} -
                {{ $tas->harga }} -
                {{ $tas->stok }} -
                {{ $tas->keterangan ?? '-' }}

                {{-- Tombol restore & force delete akan ditambahkan di commit berikutnya --}}
            </li>
        @empty
            <li class="list-group-item text-center text-muted">Tidak ada data di Trash.</li>
        @endforelse
    </ul>

    {{ $datatas->links() }}
</x-app>
