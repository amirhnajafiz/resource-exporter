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
            <x-post.features-bar :post="$post" :type="$type"></x-post.features-bar>
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
            <x-post.comment-bar :post="$post"></x-post.comment-bar>
        </div>
    </div>
</div>
