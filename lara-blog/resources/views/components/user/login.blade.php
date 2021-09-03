@extends('layouts.main')

@section('content')
    <div class="w-75 m-auto">
        <form action="" method="post">
            @csrf
            <div class="form-group row d-flex align-items-center">
                <div class="d-inline-block col-1 text-right pr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </div>
                <div class="d-inline-block col-11">
                    <label for="exampleInputEmail1">Email address or Phone number</label>
                    <input type="text" name="main_key" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email or phone ...">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center">
                <div class="d-inline-block col-1 text-right pr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                </div>
                <div class="d-inline-block col-11">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password ...">
                </div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary mr-1">Send</button>
                <button type="reset" class="btn btn-danger ml-1">Reset</button>
            </div>
        </form>
    </div>
@stop
