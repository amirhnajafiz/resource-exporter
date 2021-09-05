@extends('layouts.main')

@section('content')
    <div>
        <h2 class="text-center">
            {{ "Welcome " . $user->name }}
        </h2>
    </div>
@stop
