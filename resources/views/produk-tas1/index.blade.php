<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <a class="btn btn-primary mb-3" href="{{ route('produk-tas.create') }}">Create</a>

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
                <form action="{{ route('produk-tas.destroy', $tas) }}" method="POST" class="d-inline"> @method('DELETE')
                    @csrf <button type="submit"
                        class="btn btn-danger btn-sm"onclick="return confirm('ANDA YAKIN')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

</x-app>
