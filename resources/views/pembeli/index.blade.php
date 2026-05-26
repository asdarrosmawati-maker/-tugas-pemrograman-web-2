<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a class="btn btn-primary mb-3" href="{{ route('pembeli.create') }}" role="button">CREATE</a>

    <form action="{{ route('pembeli.index') }}" method="GET">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search pembeli name ..." value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($pembelis as $pembeli)
            <li class="list-group-item">
                <strong>{{ $pembelis->firstItem() + $loop->index }}.</strong>
                {{ $pembeli->nama }} - {{ $pembeli->alamat }} - {{ $pembeli->no_hp }}

                {{-- Tombol Detail --}}
                <a href="{{ route('pembeli.show', $pembeli) }}" class="btn btn-info btn-sm ms-2">Detail</a>

                {{-- Tombol Edit --}}
                <a href="{{ route('pembeli.edit', $pembeli) }}" class="btn btn-warning btn-sm ms-2">Edit</a>

                {{-- Tombol Delete --}}
                <form action="{{ route('pembeli.destroy', $pembeli) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $pembelis->links() }}
    </div>
</x-app>
