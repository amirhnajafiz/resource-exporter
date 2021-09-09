<div {{ $attributes }}>
    <div class="w-50 m-auto text-dark bg-light rounded">
        @if($type == "view")
            <h3
                class="text-center bg-dark text-light rounded py-3 mb-0"
                style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
            >
                {{ $post->title }}<br />
                <small>
                    {{ "Posted by: " . $post->user->name }}
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
        @else
            <div class="d-flex w-100 justify-content-start flex-wrap px-5 py-4">
                <div class="d-inline-block rounded-circle bg-danger mr-2" style="width: 25px; height: 25px;"></div>
                <div class="h5 d-inline-block">
                    {{ $post->user->name }}
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
        @endif
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="p-5 mt-1">
            <div class="h6 border rounded p-4">
                {!! $post->content !!}
            </div>
            <div class="d-flex justify-content-around">
                <button
                    class="btn btn-light text-primary"
                    onclick="like('{{ $post->id }}', '{{ \Illuminate\Support\Facades\URL::to('/like') }}')">
                    <small id="{{ "like-" . $post->id }}">
                        {{ $post->likes->count() }}
                    </small>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                    </svg>
                </button>
                <button
                    class="btn btn-light text-danger"
                    onclick="love('{{ $post->id }}', '{{ \Illuminate\Support\Facades\URL::to("/love") }}')">
                    <small id="{{ "love-" . $post->id }}">
                        {{ $post->loves->count() }}
                    </small>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                    </svg>
                </button>
                <button
                    class="btn btn-light text-dark"
                    onclick="save('{{ $post->id }}', '{{ \Illuminate\Support\Facades\URL::to('/save') }}')">
                    <small id="{{ "save-" . $post->id }}" style="display: none"></small>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save2-fill" viewBox="0 0 16 16">
                        <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v6h-2a.5.5 0 0 0-.354.854l2.5 2.5a.5.5 0 0 0 .708 0l2.5-2.5A.5.5 0 0 0 10.5 7.5h-2v-6z"/>
                    </svg>
                </button>
                @if($type != 'view')
                    <button class="btn btn-light text-success">
                        <a href="{{ route('view.post', $post->id) }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
                                <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A1.993 1.993 0 0 0 8 6c-.532 0-1.016.208-1.375.547zM14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                            </svg>
                        </a>
                    </button>
                @endif
            </div>
            @if($post->user->id == \Illuminate\Support\Facades\Auth::id() && $type="view")
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
                </div>
            @endif
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
                    <input type="submit" value="Send" class="btn btn-success mt-2" />
                </form>
            </div>
            <div class="my-3">
                @if(count($post->comments) > 0)
                    @foreach($post->comments as $comment)
                        <div class="border rounded my-1 p-2">
                            <div class="h6 d-flex align-center flex-wrap">
                                <span class="d-inline-block rounded-circle bg-success" style="width: 20px; height: 20px;"></span>
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
    </div>
</div>
