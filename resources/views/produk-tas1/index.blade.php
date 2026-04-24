<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($datatas as $tas)
            <li class="list-group-item" small 14x;>
                {{ $loop->iteration }}.
                {{ $tas->name }}.
                {{ $tas->merek }}.
                {{ $tas->jenis }}.
                {{ $tas->harga }}.
                {{ $tas->stok }}</li>
        @endforeach
    </ul>
</x-app>
