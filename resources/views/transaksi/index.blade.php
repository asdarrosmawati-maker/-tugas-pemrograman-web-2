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
    <a class="btn btn-primary mb-3" href="{{ route('transaksi.create') }}" role="button">CREATE</a>
    @csrf

    <ul class="list-group">
        @foreach ($transaksi as $item)
            <li class="list-group-item">
                <strong>{{ $loop->iteration }}.</strong>
                {{ $item->pembeli->nama }} -
                {{ $item->kode_transaksi }} -
                {{ $item->tanggal_transaksi }} -
                {{ $item->jumlah_barang }} -
                {{ number_format($item->total_harga, 0, ',', '.') }}

                {{-- tombol edit --}}
                <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
            </li>
        @endforeach
    </ul>
</x-app>
