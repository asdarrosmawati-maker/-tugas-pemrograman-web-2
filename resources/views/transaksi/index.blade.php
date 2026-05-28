<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a class="btn btn-primary mb-3" href="{{ route('transaksi.create') }}" role="button">CREATE</a>
    <!-- Form pencarian transaksi -->
    <form action="{{ route('transaksi.index') }}" method="GET" class="mb-3">
        <input type="text" name="keyword" placeholder="Search transaksi..." value="{{ request('keyword') }}"
            class="form-control d-inline w-50">
        <button type="submit" class="btn btn-success">Search</button>
    </form>

    @if ($transaksis->isEmpty())
        <div class="alert alert-info">Tidak ada transaksi yang ditemukan.</div>
    @else
        <ul class="list-group">
            @foreach ($transaksis as $item)
                <li class="list-group-item">
                    <strong>{{ $transaksis->firstItem() + $loop->index }}.</strong>
                    {{ $item->pembeli->nama }} -
                    {{ $item->kode_transaksi }} -
                    {{ $item->tanggal_transaksi }} -
                    {{ $item->jumlah_barang }} -
                    {{ number_format($item->total_harga, 0, ',', '.') }}

                    {{-- Tombol Detail --}}
                    <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>

                    {{-- tombol edit --}}
                    <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    {{-- Tombol Delete --}}
                    <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <div class="mt-3">
            {{ $transaksis->links() }}
        </div>
    @endif
</x-app>
