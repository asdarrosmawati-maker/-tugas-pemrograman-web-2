<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <a class="btn btn-primary mb-3" href="{{ route('tas.create') }}">Create</a>

    <ul class="list-group">
        @foreach ($datatas as $tas)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $tas->name }} -
                {{ $tas->merek }} -
                {{ $tas->jenis }} -
                {{ $tas->harga }} -
                {{ $tas->stok }}

                <a href="{{ route('produk-tas.edit', $tas) }}" class="btn btn-warning btn-sm">Edit
                </a>
            </li>
        @endforeach
    </ul>

</x-app>
