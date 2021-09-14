@extends('layouts.main')

@section('content')
    <div class="w-75 m-auto text-dark bg-light rounded"
         style="margin-top: 150px !important;"
    >
        <x-admin.header.admin-panel-nav></x-admin.header.admin-panel-nav>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="p-4">
            @yield('context')
        </div>
    </div>
@stop

