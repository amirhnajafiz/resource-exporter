@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            Create a new post
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="p-5 mt-2">
            <form action="{{ route('create.post') }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}" />
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="titleForm">Post title</label>
                        <input type="text" name="title" class="form-control" id="titleForm" aria-describedby="emailHelp" placeholder="Enter title ...">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="postContent">Content</label>
                        <textarea id="postContent" class="form-control" name="content" placeholder="Write the body ..."></textarea>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-success mr-1">Put</button>
                    <button type="reset" class="btn btn-danger ml-1">Reset</button>
                </div>
            </form>
        </div>
    </div>
@stop
