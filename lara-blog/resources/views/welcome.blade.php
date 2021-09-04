@extends('layouts.main')

@section('content')
    <main role="main" class="container text-dark w-75" style="margin-top: 200px !important;">
        <div class="jumbotron">
            <div class="row">
                <h1 class="mb-3 d-inline-block col-lg-2 col-md-12 col-sm-12">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-emoji-laughing-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5c0 .501-.164.396-.415.235C6.42 6.629 6.218 6.5 6 6.5c-.218 0-.42.13-.585.235C5.164 6.896 5 7 5 6.5 5 5.672 5.448 5 6 5s1 .672 1 1.5zm5.331 3a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zm-1.746-2.765C10.42 6.629 10.218 6.5 10 6.5c-.218 0-.42.13-.585.235C9.164 6.896 9 7 9 6.5c0-.828.448-1.5 1-1.5s1 .672 1 1.5c0 .501-.164.396-.415.235z"/>
                    </svg>
                </h1>
                <p class="lead d-inline-block col-lg-10 col-md-12 col-sm-12">
                    Hi, welcome to lara blog. A website to create, share, and modify your posts.<br />
                    It's place for sharing your lovely day with other peoples and even your friends.<br />
                    Just create an account and start communicate with other peoples.
                </p>
            </div>
            <a class="btn btn-lg btn-primary d-block m-auto my-4 w-25" href="{{ route('login.page') }}" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z"/>
                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                </svg>
                Login now
            </a>
        </div>
    </main>
@stop
