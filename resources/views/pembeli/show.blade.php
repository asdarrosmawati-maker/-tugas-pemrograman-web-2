<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    <a class="btn btn-warning mb-3" href="{{ route('pembeli.index') }}" role="button">Back</a>

    {{-- Data Pembeli --}}
    <h4>Data Pembeli</h4>
    <ul class="list-group mb-3">
        <li class="list-group-item">Nama: {{ $pembeli->nama }}</li>
        <li class="list-group-item">Created At: {{ $pembeli->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">Last Update: {{ $pembeli->updated_at->diffForHumans() }}</li>
    </ul>

    {{-- Data Transaksi --}}
    <h4 class="mt-4">Data Transaksi</h4>
    <ul class="list-group">
        @foreach ($transaksis as $transaksi)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                Pembeli ID: {{ $transaksi->pembeli_id }} |
                Kode Transaksi: {{ $transaksi->kode_transaksi }} |
                Tanggal: {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d F Y') }} |
                Jumlah Barang: {{ $transaksi->jumlah_barang }} |
                Total Harga: Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}
            </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $transaksis->links() }}
    </div>
</x-app>
