<div class="mt-2">
    <small>Categories: </small>
    @forelse($post->categories as $category)
        <span class="badge badge-secondary">
            {{ $category->title }}
        </span>
    @empty
        <span class="badge">
            No categories
        </span>
    @endforelse
</div>
