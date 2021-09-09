@extends('layouts.main')

@section('content')
    <x-post.post-card
        :post="$post"
        type="view"
        style="margin-top: 150px !important;"
    >
    </x-post.post-card>
@stop

@section('scripts')
    <script>
        function love(id) {
            $.ajax({
                url: '{{ \Illuminate\Support\Facades\URL::to('/love') }}' + "/" + id,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success(response) {
                    document.getElementById('love-' + id).innerText = response.total;
                },
                error() {
                    alert("Failed");
                }
            });
        }

        function like(id) {
            $.ajax({
                url: '{{ \Illuminate\Support\Facades\URL::to('/like') }}' + "/" + id,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success(response) {
                    document.getElementById('like-' + id).innerText = response.total;
                },
                error() {
                    alert("Failed");
                }
            });
        }

        function save(id) {
            $.ajax({
                url: '{{ \Illuminate\Support\Facades\URL::to('/save') }}' + "/" + id,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success(response) {
                    document.getElementById('save-' + id).innerText = response.status;
                    document.getElementById('save-' + id).style.display = 'inline-block';
                    setTimeout(function () {
                        document.getElementById('save-' + id).innerText = null;
                        document.getElementById('save-' + id).style.display = 'none';
                    }, 1000);
                },
                error() {
                    alert("Failed");
                }
            });
        }
    </script>
@stop
