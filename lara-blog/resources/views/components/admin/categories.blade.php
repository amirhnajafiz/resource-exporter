@extends('components.admin.main')

@section('context')
    <div class="d-flex justify-content-between mb-2">
        <div class="h4">
            Categories
        </div>
        <a class="btn btn-success" href="{{ route('categories.create') }}">
            Create a new category
        </a>
    </div>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Options</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < count($categories); $i++)
            <tr>
                <th scope="row">
                    {{ $i + 1 }}
                </th>
                <td>
                    <a href="{{ route('categories.show', $categories[$i]->id) }}" target="_blank">
                        {{ $categories[$i]->title }}
                    </a>
                </td>
                <td>
                    {{ $categories[$i]->slug }}
                </td>
                <td class="d-flex justify-content-start">
                    <form action="{{ route('categories.destroy', $categories[$i]->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-light text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                            </svg>
                        </button>
                    </form>
                    <a href="{{ route('categories.edit', $categories[$i]->id) }}" class="btn btn-light text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                </td>
                <td>
                    @if($categories[$i]->image)
                        <img
                            src="{{ str_starts_with($categories[$i]->image->path, 'http') ? $categories[$i]->image->path : asset('storage/' . $categories[$i]->image->path) }}"
                            alt="{{ $categories[$i]->image->alt }}" width="20"/>
                    @else
                        <span>
                        </span>
                    @endif
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@stop

