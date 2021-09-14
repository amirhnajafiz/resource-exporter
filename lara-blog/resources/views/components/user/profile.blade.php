@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important; margin-bottom: 100px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            User profile
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="w-100 d-flex justify-content-center">
            <div class="w-100 m-0">
                <div class="card user-card-full" style="margin-bottom: 0 !important;">
                    <div class="row m-l-0 m-r-0 m-b-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile py-5">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                         fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"/>
                                    </svg>
                                </div>
                                <h6 class="f-w-600">
                                    {{ $user->name }}
                                </h6>
                                <p> {{ $user->is_admin == 1 ? "Admin user" : "Normal user" }}</p>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8 py-5">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Posts Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Posts</p>
                                        <h6 class="text-muted f-w-400">
                                            {{ $user->posts->count() }}
                                        </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Saves</p>
                                        <h6 class="text-muted f-w-400">
                                            {{ $user->saves->count() }}
                                        </h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">
                                    Others
                                </h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Loves</p>
                                        <h6 class="text-muted f-w-400">
                                            {{ $user->loves->count() }}
                                        </h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Likes</p>
                                        <h6 class="text-muted f-w-400">
                                            {{ $user->likes->count() }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
