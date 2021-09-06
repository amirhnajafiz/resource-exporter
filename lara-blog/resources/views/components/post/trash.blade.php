@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ "Recently deleted posts" }}<br />
            <small class="h6">Restore or delete your posts</small>
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="p-5 mt-1">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <x-post.post
                        title="{{ $post->title }}"
                        content="{{ $post->content }}"
                        created="{{ $post->created_at }}"
                        link=""
                        id="{{ $post->id }}"
                    ></x-post.post>
                @endforeach
            @else
                <div class="bg-danger text-light p-4 rounded d-flex justify-content-between">
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

