@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ "Edit your profile " . $user->name }}
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="text-secondary text-center my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-terminal" viewBox="0 0 16 16">
                <path d="M6 9a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3A.5.5 0 0 1 6 9zM3.854 4.146a.5.5 0 1 0-.708.708L4.793 6.5 3.146 8.146a.5.5 0 1 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2z"/>
                <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12z"/>
            </svg>
        </div>
        <div class="p-5 mt-3">
            <form action="{{ route('update.user') }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <div class="form-group row d-flex align-items-center">
                    <div class="d-inline-block col-lg-2 col-md-2 col-sm-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                        </svg>
                    </div>
                    <div class="d-inline-block col-10 col-md-10 col-sm-12">
                        <label for="exampleInputEmail1">Email address</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            placeholder="Enter email ..."
                            value="{{ $user->email }}"
                        />
                        <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center">
                    <div class="d-inline-block col-lg-2 col-md-2 col-sm-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                    </div>
                    <div class="d-inline-block col-10 col-md-10 col-sm-12">
                        <label for="exampleInputPhone">Phone number</label>
                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            id="exampleInputPhone"
                            aria-describedby="phoneHelp"
                            placeholder="Enter phone number ..."
                            value="{{ $user->phone }}">
                        <small id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</small>
                    </div>
                </div>
                <div class="form-group row d-flex align-items-center">
                    <div class="d-inline-block col-lg-2 col-md-2 col-sm-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </div>
                    <div class="d-inline-block col-10 col-md-10 col-sm-12">
                        <label for="exampleInputName">Account name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            id="exampleInputName"
                            aria-describedby="nameHelp"
                            placeholder="Enter a name ..."
                            value="{{ $user->name }}">
                        <small id="nameHelp" class="form-text">This name will display in all of your posts.</small>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary mr-1">Update</button>
                    <a type="button" href="{{ route('dashboard') }}" class="btn btn-danger ml-1">Cancel</a>
                </div>
            </form>
            <a href="{{ route('password.change.page', $user) }}" class="d-block text-center mt-3">
                Change your password
            </a>
        </div>
    </div>
@stop
