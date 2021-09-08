@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            Change your password
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="text-secondary text-center my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
            </svg>
        </div>
        <div class="p-5 mt-3">
            <form action="{{ route('password.change') }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="user" value="{{ $user->id }}" />
                <div class="form-group row d-flex align-items-center">
                    <div class="d-inline-block col-lg-2 col-md-2 col-sm-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                    </div>
                    <div class="d-inline-block col-10 col-md-10 col-sm-12">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input
                            type="password"
                            name="old_password"
                            class="form-control"
                            id="exampleInputPassword1"
                            placeholder="Enter password ..."
                        />
                        <label for="exampleInputPassword2">New Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            id="exampleInputPassword2"
                            placeholder="Enter password ..."
                        />
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary mr-1">Change</button>
                    <a type="button" href="{{ route('update.user.page', $user) }}" class="btn btn-danger ml-1">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop

