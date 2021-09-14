<div>
    <div class="my-3">
        <form action="{{ route('comment') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <label for="comment">
                Leave a comment
            </label>
            <textarea
                id="comment"
                class="form-control"
                name="comment"
                placeholder="Write something ..."
            ></textarea>
            <input type="submit" value="Send" class="btn btn-success mt-2"/>
        </form>
    </div>
    <div class="my-3">
        @if(count($post->comments) > 0)
            @foreach($post->comments as $comment)
                <div class="border rounded my-1 p-2">
                    <div class="h6 d-flex align-center flex-wrap">
                        <span class="d-inline-block rounded-circle bg-success"
                              style="width: 20px; height: 20px;"></span>
                        <span class="ml-1">
                            {{ $comment->user->name }}
                        </span>
                    </div>
                    <div>
                        {{ $comment->content }}
                    </div>
                    <small>
                        {{ $comment->created_at }}
                    </small>
                </div>
            @endforeach
        @else
            <h5>
                Comments soon ...
            </h5>
        @endif
    </div>
</div>
