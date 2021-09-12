<div class="mt-2">
    <small>Tags: </small>
    @forelse($post->tags as $tag)
        <span class="badge badge-primary">
            {{ '#' . $tag->title }}
        </span>
    @empty
        <span class="badge">
            No tags
        </span>
    @endforelse
</div>
