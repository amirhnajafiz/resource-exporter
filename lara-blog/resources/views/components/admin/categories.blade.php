@extends('components.admin.main')

@section('context')
    <div class="h4">
        Categories
    </div>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < count($categories); $i++)
            <tr>
                <th scope="row">
                    {{ $i + 1 }}
                </th>
                <td>
                    {{ $categories[$i]->title }}
                </td>
                <td>
                    {{ $categories[$i]->slug }}
                </td>
                <td>
                    <form action="{{ route('categories.destroy', $categories[$i]->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-light text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@stop

