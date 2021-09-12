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
            <x-post.body.content-box :post="$post"></x-post.body.content-box>
            <x-post.body.features-bar :post="$post" :type="$type"></x-post.body.features-bar>
            @if($post->user->id == \Illuminate\Support\Facades\Auth::id() && $type="view")
                <x-post.body.modify-bar :post="$post"></x-post.body.modify-bar>
            @endif
            <div>
                <small>Tags: </small>
                @forelse($post->tags as $tag)
                    <span class="badge badge-primary">
                        {{ '#' . $tag->title }}
                    </span>
                @empty
                    <span>
                        No tags
                    </span>
                @endforelse
            </div>
            <div>
                <small>Categories: </small>
                @forelse($post->categories as $category)
                    <span class="badge badge-secondary">
                        {{ $category->title }}
                    </span>
                @empty
                    <span>
                        No categories
                    </span>
                @endforelse
            </div>
            <x-post.body.comment-bar :post="$post"></x-post.body.comment-bar>
        </div>
    </div>
</div>
