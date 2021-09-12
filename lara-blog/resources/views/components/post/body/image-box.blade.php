<div class="my-2 text-center mb-4">
    <img
        src="{{ str_starts_with($post->image->path, 'http') ? $post->image->path : asset('storage/' . $post->image->path) }}"
        alt="{{ $post->image->alt }}"
        class="rounded" width="400"/>
</div>
