@extends('layouts.main')

@section('content')
    <div class="w-75 m-auto text-dark bg-light rounded"
         style="margin-top: 150px !important;"
    >
        <div>
            Header
        </div>
        <div>
            @yield('context')
        </div>
    </div>
@stop
