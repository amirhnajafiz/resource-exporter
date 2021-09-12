@extends('components.admin.main')

@section('context')
    <div class="h4">
        Tags
    </div>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < count($tags); $i++)
            <tr>
                <th scope="row">
                    {{ $i + 1 }}
                </th>
                <td>
                    {{ $tags[$i]->title }}
                </td>
                <td>
                    {{ $tags[$i]->slug }}
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
@stop
