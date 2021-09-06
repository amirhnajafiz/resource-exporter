@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ $post->title }}<br />
            <small>
                {{ "Posted by: " . $post->user->name }}
            </small>
        </h3>
        <div class="p-5 mt-1">
            <p>
                {{ $post->content }}
            </p>
            <small>
                {{ "Created at: " . $post->created_at }}
            </small>
            <small>
                {{ "Last edit: " . $post->updated_at }}
            </small>
        </div>
    </div>
@stop
