@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ "Recently deleted posts" }}<br/>
            <small class="h6">Restore or delete your posts</small>
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="text-danger text-center my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-trash-fill"
                 viewBox="0 0 16 16">
                <path
                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
        </div>
        <div class="p-5 mt-1" style="margin-bottom: 80px !important;">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <x-post.post
                        :post="$post"
                        type="trash"
                    ></x-post.post>
                @endforeach
            @else
                <div class="bg-danger text-light p-4 rounded d-flex justify-content-between"
                     style="margin-bottom: 100px !important;">
                    <span class="h4">
                        Trash is empty
                    </span>
                    <a href="{{ route('dashboard') }}" class="btn btn-light">
                        Back
                    </a>
                </div>
            @endif
        </div>
    </div>
@stop

