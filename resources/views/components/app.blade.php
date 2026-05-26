<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Penjualan Tas' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-info.bg-gradient navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PENJUALAN</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('produk-tas.index') }}">Produk tas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pembeli.index') }}">Pembeli</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Header --}}
    <div class="text-center py-3 bg-primary text-white">
        <h2>{{ $title }}</h2>
    </div>

    {{-- Konten --}}
    <div class="container my-4">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
