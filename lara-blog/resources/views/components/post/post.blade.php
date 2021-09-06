<div class="mb-4">
    <div class="bg-dark text-light p-3 mb-1 rounded">
        <div class="h5">
            {{ $title }}
        </div>
        <p>
            {{ strlen($content) > 50 ? substr($content, 0 , 47) . ' ...' : $content }}
        </p>
        <small class="bg-light text-dark rounded p-2">
            {{ 'Created: ' . $created }}
        </small>
    </div>
</div>
