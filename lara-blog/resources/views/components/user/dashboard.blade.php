@extends('layouts.main')

@section('content')
    <div>
        <h2 class="text-center">
            {{ "Welcome " . $user->name }}
        </h2>
        <div>
            @foreach($user->posts as $post)
                <x-post.post
                    title="{{ $post->title }}"
                    content="{{ $post->content }}"
                ></x-post.post>
            @endforeach
        </div>
    </div>
@stop
