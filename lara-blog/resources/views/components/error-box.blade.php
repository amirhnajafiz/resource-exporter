<div class="d-block alert alert-danger mt-0">
    <ul class="px-4 m-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
