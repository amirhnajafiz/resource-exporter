<div class="mt-2">
    <small>Categories: </small>
    @forelse($post->categories as $category)
        <span class="badge badge-secondary">
            @if($category->image)
                <img width="20px"
                     src="{{ str_starts_with($category->image->path, 'http') ? $category->image->path : asset('storage/' . $category->image->path) }}"
                     alt="{{ $category->image->alt }}"/>
            @endif
            {{ $category->title }}
        </span>
    @empty
        <span class="badge">
            No categories
        </span>
    @endforelse
</div>
