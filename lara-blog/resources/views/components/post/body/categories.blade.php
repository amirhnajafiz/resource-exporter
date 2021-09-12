<div class="mt-2">
    <small>Categories: </small>
    @forelse($post->categories as $category)
        <span class="badge badge-secondary">
            @if($category->image)
                <img width="20px"
                     src="{{ str_starts_with($post->image->path, 'http') ? $post->image->path : asset('storage/' . $post->image->path) }}"
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
