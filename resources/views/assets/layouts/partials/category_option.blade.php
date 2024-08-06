<option value="{{ $category->id }}">
    {{ str_repeat('--', $level) }} {{ $category->name }}
</option>
@if($category->children)
    @foreach($category->children as $child)
        @include('assets.layouts.partials.category_option', ['category' => $child, 'level' => $level + 1])
    @endforeach
@endif