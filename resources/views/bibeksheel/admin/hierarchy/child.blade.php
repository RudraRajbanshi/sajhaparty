<li>{{ $child->title }}</li>
@if ($child->children)
    <ul>
        @foreach ($child->children as $child)
            @include('admin.hierarchy.child', ['child' => $child])
        @endforeach
    </ul>
@endif