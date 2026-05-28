<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <a class="btn btn-warning mb-3" href="{{ route('transaksi.index') }}" role="button">Back</a>

    {{-- Data Transaksi --}}
    <h4 class="mt-4">Data Transaksi</h4>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>ID:</strong> {{ $transaksi->id }}</li>
        <li class="list-group-item"><strong>Pembeli:</strong> {{ $transaksi->pembeli->nama ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</li>
        <li class="list-group-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d F Y') }}</li>
        <li class="list-group-item"><strong>Jumlah Barang:</strong> {{ $transaksi->jumlah_barang }}</li>
        <li class="list-group-item"><strong>Total Harga:</strong> Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</li>
        <li class="list-group-item"><strong>Created:</strong> {{ $transaksi->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item"><strong>Updated:</strong> {{ $transaksi->updated_at->diffForHumans() }}</li>
    </ul>

    {{-- Data Pembeli (jika ada relasi) --}}
    @if($transaksi->pembeli)
        <h4>Data Pembeli</h4>
        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>Nama:</strong> {{ $transaksi->pembeli->nama }}</li>
            <li class="list-group-item"><strong>Alamat:</strong> {{ $transaksi->pembeli->alamat }}</li>
            <li class="list-group-item"><strong>No HP:</strong> {{ $transaksi->pembeli->no_hp }}</li>
            <li class="list-group-item"><strong>Created:</strong> {{ $transaksi->pembeli->created_at->format('d F Y H:i:s') }}</li>
        </ul>
    @endif

    {{-- Action Buttons --}}
    <div class="mt-3">
        <a href="{{ route('transaksi.edit', $transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('transaksi.destroy', $transaksi) }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
        </form>
    </div>
</x-app>
