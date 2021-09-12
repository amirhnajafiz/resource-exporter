@extends('components.admin.main')

@section('context')
    <div class="d-flex justify-content-between mb-2">
        <div class="h4">
            Posts
        </div>
        <div class="rounded bg-dark text-light">
            <a href="{{ route('admin.posts', ($offset - 25)) }}" class="btn text-light">Prev</a>
            <small class="badge">
                {{ $offset }}
            </small>
            <a href="{{ route('admin.posts', ($offset + 25)) }}" class="btn text-light">Next</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">User</th>
            <th scope="col">Tags</th>
            <th scope="col">Categories</th>
            <th scope="col">Created at</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < count($posts); $i++)
            <tr>
                <th scope="row">
                    {{ $i + 1 }}
                </th>
                <td>
                    {{ $posts[$i]->title }}
                </td>
                <td>
                    {{ $posts[$i]->user->email }}
                </td>
                <td>
                    {{ $posts[$i]->tags->implode('title', ', ') }}
                </td>
                <td>
                    {{ $posts[$i]->categories->implode('title', ', ') }}
                </td>
                <td>
                    {{ $posts[$i]->created_at }}
                </td>
                <td class="d-flex justify-content-start">
                    <form action="{{ route('delete.post', $posts[$i]->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-light text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                            </svg>
                        </button>
                    </form>
                    <a href="{{ route('view.post', $posts[$i]->id) }}" class="btn btn-light text-primary" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@stop


