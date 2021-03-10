<ul>
    @foreach ($hierarchies as $hierarchy)
        <li>{{ $hierarchy->title }}</li>
        <ul>
            @foreach ($hierarchy->children as $child)
                @include('admin.hierarchy.child', ['child' => $child])
            @endforeach
        </ul>
    @endforeach
</ul>