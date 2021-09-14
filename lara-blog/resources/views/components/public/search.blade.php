@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
                Search results<br />
            <small>
                {{ $total }} results of {{ implode(', ', $keywords) }}
            </small>
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="text-dark text-center my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </div>
        <hr />
        <div class="d-flex m-auto my-2 w-25 justify-content-center align-items-center rounded bg-dark text-light">
            <form action="{{ route('search', ($offset - 5)) }}" method="get">
                @csrf
                <input type="hidden" name="keyword" value="{{ implode('|', $keywords) }}" />
                <input type="submit" class="btn text-light" value="Prev" />
            </form>
            <small class="badge badge-light">
                {{ $offset }}
            </small>
            <form action="{{ route('search', ($offset + 5)) }}" method="get">
                @csrf
                <input type="hidden" name="keyword" value="{{ implode('|', $keywords) }}" />
                <input type="submit" class="btn text-light" value="Next" />
            </form>
        </div>
        <hr />
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="p-5 mt-1">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <x-post.post
                        :post="$post"
                        type="view"
                    ></x-post.post>
                @endforeach
            @else
                <div class="bg-danger text-light p-4 rounded d-flex justify-content-between">
                    <span class="h4">
                        Nothing found
                    </span>
                    <a href="{{ route('index') }}" class="btn btn-light">
                        Back
                    </a>
                </div>
            @endif
        </div>
    </div>
@stop

