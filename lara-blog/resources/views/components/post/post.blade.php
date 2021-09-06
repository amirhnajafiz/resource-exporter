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
                <span>
                    View post
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>
            </a>
        </div>
    </div>
</div>
