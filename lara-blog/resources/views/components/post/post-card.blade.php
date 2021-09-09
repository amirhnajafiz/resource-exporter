<div {{ $attributes }}>
    <div class="w-50 m-auto text-dark bg-light rounded">
        @if($type == "view")
            <x-post.header.view-header :post="$post"></x-post.header.view-header>
        @else
            <x-post.header.index-header :post="$post"></x-post.header.index-header>
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
