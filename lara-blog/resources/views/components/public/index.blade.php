@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto bg-white text-dark rounded p-4">
        <div class="d-flex w-100 justify-content-start flex-wrap">
            <div class="d-inline-block rounded-circle bg-danger mr-2" style="width: 25px; height: 25px;"></div>
            <div class="h5 d-inline-block">
                User name
            </div>
        </div>
        <div class="border rounded mt-2 p-2">
            <p>
                Content
            </p>
        </div>
        <div class="mt-2">
            <form action="" method="post">
                @csrf
                <label for="comment">
                    Leave a comment
                </label>
                <textarea
                    id="comment"
                    class="form-control"
                    name="comment"
                    placeholder="Write something ..."
                ></textarea>
                <input type="submit" value="Send" class="btn btn-success mt-2" disabled />
            </form>
        </div>
        <div class="my-3">
            <h5>
                Comments soon ...
            </h5>
        </div>
    </div>
@stop
