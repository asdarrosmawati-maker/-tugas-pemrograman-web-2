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
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Cari</button>
            </div>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($pembelis as $pembeli)
            <li class="list-group-item">
                {{ $pembelis->firstItem() + $loop->index }}.
                {{ $pembeli->nama }} -
                {{ $pembeli->alamat }} -
                {{ $pembeli->no_hp }}
            </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $pembelis->links() }}
    </div>
</x-app>
