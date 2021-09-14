@extends('layouts.main')

@section('content')
    <div class="position-relative overflow-hidden p-0 bg-light text-dark"
         style="height: 800px; background-image: url('{{ asset('images/main.svg') }}'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed"
    >
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="w-75 text-left border shadow mx-auto my-5 p-5 rounded bg-light" style="margin-top: 250px !important;">
            <div class="row pt-2">
                <p class="lead d-inline-block col-12">
                    Hi, welcome to lara blog.<br />
                    A website to create, share, and modify your posts.<br />
                    It's place for sharing your lovely day with other peoples and even your friends.<br />
                    Just create an account and start communicate with other peoples.
                </p>
            </div>
            <div class="d-flex justify-content-around">
                <a class="btn btn-lg btn-primary d-inline-block w-25" href="{{ route('login.page') }}" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1h-1z"/>
                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                    </svg>
                    Login now
                </a>
                <a class="btn btn-lg btn-success d-inline-block w-25" href="{{ route('register.page') }}" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                    </svg>
                    Register now
                </a>
            </div>
        </div>
        <div class="product-device box-shadow d-none d-md-block"></div>
        <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    </div>
@stop
