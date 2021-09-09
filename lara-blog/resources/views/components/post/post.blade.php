<div class="mb-4">
    <div class="bg-dark text-light p-3 mb-1 rounded">
        <div class="h5">
            {{ $post->title }}
        </div>
        <p>
            {{ strlen($content) > 20 ? substr($content, 0 , 19) . '...' : $content }}
        </p>
        <div class="d-flex justify-content-between flex-wrap">
            <small class="bg-light text-dark rounded p-2">
                {{ 'Created: ' . $post->created_at }}
            </small>
            @if($type == 'view')
            <a href="{{ route('view.post', $post->id) }}" class="btn btn-light">
                <span>
                    View post
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>
            </a>
            @else
                <div class="d-flex justify-content-end">
                    <div id="{{ 'rm' . $post->id }}" style="display: none;">
                        <form action="{{ route('force.post', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <small class="mr-3">
                                Are you sure you want to delete this post?
                            </small>
                            <button type="submit" class="btn btn-danger mr-1">
                                Yes
                            </button>
                        </form>
                    </div>
                    <button class="btn btn-dark text-danger mr-1" onclick="togglePanel({{ $post->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                    <form action="{{ route('restore.post', $post->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-dark text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

@section('scripts')
    <script>
        function togglePanel(link) {
            if (document.getElementById('rm' + link).style.display === 'block') {
                document.getElementById('rm' + link).style.display = 'none';
            } else {
                document.getElementById('rm' + link).style.display = 'block';
            }
        }
    </script>
@stop
