@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ "Welcome " . $user->name }}<br />
            <small>See saved posts</small>
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="p-5 mt-1">
            @if(count($user->saves) > 0)
                @foreach($user->saves as $save)
                    <x-post.post
                        title="{{ $save->post->title }}"
                        content="{{ preg_replace('/(<([^>]+)>)/', '', $save->post->content) }}"
                        created="{{ $save->post->created_at }}"
                        link="{{ $save->post->id }}"
                        id="{{ $save->post->id }}"
                    ></x-post.post>
                @endforeach
            @else
                <div class="bg-danger text-light p-4 rounded d-flex justify-content-between">
                    <span class="h4">
                        No saves yet
                    </span>
                    <a href="{{ route('dashboard') }}" class="btn btn-light">
                        Back
                    </a>
                </div>
            @endif
        </div>
    </div>
@stop
