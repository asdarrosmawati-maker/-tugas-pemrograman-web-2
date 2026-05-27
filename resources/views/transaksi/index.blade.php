<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Search & Filter --}}
    <form method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="keyword" class="form-control" placeholder="Search kode transaksi atau nama pembeli..."
            value="{{ request('keyword') }}">
        <select name="pembeli_id" class="form-select">
            <option value="">-- Filter Pembeli --</option>
            @foreach ($pembeli as $p)
                <option value="{{ $p->id }}" {{ request('pembeli_id') == $p->id ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success">Search</button>
    </form>

    {{-- List Transaksi --}}
    <ul class="list-group">
        @foreach ($transaksi as $item)
            <li class="list-group-item">
                <strong>{{ $transaksi->firstItem() + $loop->index }}.</strong>
                {{ $item->pembeli->nama }} -
                {{ $item->kode_transaksi }} -
                {{ $item->tanggal_transaksi }} -
                {{ $item->jumlah_barang }} -
                {{ number_format($item->total_harga, 0, ',', '.') }}
            </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $transaksi->links() }}
    </div>
</x-app>
