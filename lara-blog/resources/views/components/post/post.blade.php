<div class="mb-4">
    <div class="bg-dark text-light p-3 mb-1 rounded">
        <div class="h5">
            {{ $title }}
        </div>
        <p>
            {{ strlen($content) > 50 ? substr($content, 0 , 47) . ' ...' : $content }}
        </p>
        <div class="d-flex justify-content-between flex-wrap">
            <small class="bg-light text-dark rounded p-2">
                {{ 'Created: ' . $created }}
            </small>
            <a href="{{ route('view.post', $link) }}" class="btn btn-light">
                View post
            </a>
        </div>
    </div>
</div>
