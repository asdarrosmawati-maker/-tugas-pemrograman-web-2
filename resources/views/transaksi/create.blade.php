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
            <select class="form-select @error('pembeli_id') is-invalid @enderror" id="pembeli_id" name="pembeli_id" required>
                <option value="">-- Pilih Pembeli --</option>
                @foreach($pembeli as $item)
                    <option value="{{ $item->id }}" {{ old('pembeli_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }} - {{ $item->no_hp }}
                    </option>
                @endforeach
            </select>
            @error('pembeli_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kode_transaksi" class="form-label">Kode Transaksi</label>
            <input type="text" class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi" name="kode_transaksi"
                value="{{ old('kode_transaksi') }}" required>
            @error('kode_transaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control @error('tanggal_transaksi') is-invalid @enderror" id="tanggal_transaksi" name="tanggal_transaksi"
                value="{{ old('tanggal_transaksi') }}" required>
            @error('tanggal_transaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" name="jumlah_barang"
                value="{{ old('jumlah_barang') }}" required>
            @error('jumlah_barang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" name="total_harga"
                value="{{ old('total_harga') }}" required>
            @error('total_harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('transaksi.index') }}" class="btn btn-success">Cancel</a>
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</x-app>
