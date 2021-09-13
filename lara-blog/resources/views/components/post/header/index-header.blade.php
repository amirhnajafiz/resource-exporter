<div>
    <div class="d-flex w-100 justify-content-start flex-wrap px-5 py-4">
        <div class="d-inline-block rounded-circle bg-danger mr-2" style="width: 25px; height: 25px;"></div>
        <div class="h5 d-inline-block">
            <a href="{{ route('user.view', $post->user->id) }}" target="_blank">
                {{ $post->user->name }}
            </a>
        </div>
    </div>
    <div class="h4 my-2 px-5">
                <span>
                    {{ $post->title }}
                </span>
        <small class="blockquote-footer mt-1" style="font-size: 0.5em;">
            {{ "Created: " . $post->created_at }}
        </small>
    </div>
</div>
