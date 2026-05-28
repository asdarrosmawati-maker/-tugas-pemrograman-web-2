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

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pembeli_id" class="form-label">Pembeli</label>
            <select class="form-select" id="pembeli_id" name="pembeli_id">
                <option value="">Pilih Pembeli</option>
                @foreach($pembeli as $item)
                    <option value="{{ $item->id }}" {{ old('pembeli_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }} - {{ $item->no_hp }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kode_transaksi" class="form-label">Kode Transaksi</label>
            <input type="text" class="form-control" id="kode_transaksi" name="kode_transaksi"
                value="{{ old('kode_transaksi') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                value="{{ old('tanggal_transaksi') }}">
        </div>

        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang"
                value="{{ old('jumlah_barang') }}">
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="total_harga" name="total_harga"
                value="{{ old('total_harga') }}">
        </div>

        <a href="{{ route('transaksi.index') }}" class="btn btn-success">Cancel</a>
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</x-app>
