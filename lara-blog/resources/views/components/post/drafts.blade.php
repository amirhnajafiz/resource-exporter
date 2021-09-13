@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ "Drat posts" }}<br/>
            <small class="h6">Publish or remove your posts</small>
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="text-warning text-center my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
            </svg>
        </div>
        <div class="p-5 mt-1" style="margin-bottom: 80px !important;">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <x-post.post
                        :post="$post"
                        type="view"
                    ></x-post.post>
                @endforeach
            @else
                <div class="bg-warning text-light p-4 rounded d-flex justify-content-between"
                     style="margin-bottom: 100px !important;">
                    <span class="h4">
                        Drafts is empty
                    </span>
                    <a href="{{ route('dashboard') }}" class="btn btn-light">
                        Back
                    </a>
                </div>
            @endif
        </div>
    </div>
@stop


