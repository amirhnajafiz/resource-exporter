<h3
    class="text-center bg-dark text-light rounded py-3 mb-0"
    style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
>
    {{ $post->title }}<br />
    <small>
        <a href="{{ route('user.view', $post->user->id) }}" target="_blank">
            {{ "Posted by: " . $post->user->name }}
        </a>
    </small>
    <div class="d-flex justify-content-between mt-4 px-3">
        <small class="blockquote-footer" style="font-size: 0.5em">
            {{ "Created at: " . $post->created_at }}
        </small>
        <small class="blockquote-footer" style="font-size: 0.5em">
            {{ "Last edit: " . $post->updated_at }}
        </small>
    </div>
</h3>
