<div class="my-2 text-center mb-4">
    <img
        src="{{ str_starts_with($post->image->path, 'http') ? $post->image->path : asset('storage/' . $post->image->path) }}"
        alt="{{ $post->image->alt }}"
        class="rounded d-block m-auto mb-1 w-50" /> <br />
    <a href="{{ route('download', $post->id) }}" type="button" class="badge badge-primary">
        Download
    </a>
</div>
