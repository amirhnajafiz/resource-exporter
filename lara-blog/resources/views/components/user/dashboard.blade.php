@extends('layouts.main')

@section('content')
    <div>
        <h2 class="text-center">
            {{ "Welcome " . $user->name }}
        </h2>
        <div>
            <ul>
                @foreach($user->posts as $post)
                    <li>
                        {{ $post->title }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
