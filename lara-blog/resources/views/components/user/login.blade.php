@extends('layouts.main')

@section('content')
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address or Phone number</label>
            <input type="text" name="main_key" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email or phone ...">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password ...">
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@stop
