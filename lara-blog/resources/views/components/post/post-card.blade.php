<div {{ $attributes }}>
    <div class="w-100 m-auto text-dark bg-light rounded">
        @if($type == "view")
            <x-post.header.view-header :post="$post"></x-post.header.view-header>
        @else
            <x-post.header.index-header :post="$post"></x-post.header.index-header>
        @endif
        <div class="p-5 mt-1">
            @if($post->image)
                <x-post.body.image-box :post="$post"></x-post.body.image-box>
            @endif
            <x-post.body.content-box :post="$post"></x-post.body.content-box>
            <x-post.body.features-bar :post="$post" :type="$type"></x-post.body.features-bar>
            @if($post->user->id == \Illuminate\Support\Facades\Auth::id() && $type="view")
                <x-post.body.modify-bar :post="$post"></x-post.body.modify-bar>
            @endif
            <x-post.body.tags :post="$post"></x-post.body.tags>
            <x-post.body.categories :post="$post"></x-post.body.categories>
            @if($post->allow_comments == 1)
                <x-post.body.comment-bar :post="$post"></x-post.body.comment-bar>
            @endif
        </div>
    </div>
</div>
