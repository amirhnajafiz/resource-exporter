<div class="d-flex my-3 justify-content-between px-2 flex-wrap">
    <div>
        <form action="{{ route('delete.post', $post) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-warning">
                Delete post
            </button>
        </form>
    </div>
    <div>
        <form action="{{ route('update.post.page', $post) }}" method="get">
            @csrf
            <button type="submit" class="btn btn-secondary">
                Edit post
            </button>
        </form>
    </div>
    @if($post->published == 0)
        <div>
            <form action="{{ route('publish', $post->id) }}" method="post">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-primary">
                    Publish
                </button>
            </form>
        </div>
    @endif
</div>
