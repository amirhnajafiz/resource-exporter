@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ $post->title }}<br />
            <small>
                {{ "Posted by: " . $post->user->name }}
            </small>
            <div class="d-flex justify-content-between mt-4 px-3">
                <small class="blockquote-footer" style="font-size: 0.5em">
                    {{ "Created at: " . $post->created_at }}
                </small>
                <small class="blockquote-footer" style="font-size: 0.5em">
                    {{ "Last edit: " . $post->updated_at }}
                </small>
            </div>
        </h3>
        <div class="p-5 mt-1">
            <p class="h6 border rounded p-4">
                {{ $post->content }}
            </p>
            <div class="d-flex justify-content-around">
                <a href="#" class="btn btn-light text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                    </svg>
                </a>
                <a href="#" class="btn btn-light text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
                    </svg>
                </a>
                <a href="#" class="btn btn-light text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save2-fill" viewBox="0 0 16 16">
                        <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v6h-2a.5.5 0 0 0-.354.854l2.5 2.5a.5.5 0 0 0 .708 0l2.5-2.5A.5.5 0 0 0 10.5 7.5h-2v-6z"/>
                    </svg>
                </a>
            </div>
            <div class="my-3">
                <form action="" method="post">
                    @csrf
                    <label for="comment">
                        Leave a comment
                    </label>
                    <textarea
                        id="comment"
                        class="form-control"
                        name="comment"
                        placeholder="Write something ..."
                    ></textarea>
                    <input type="submit" value="Send" class="btn btn-success mt-2" disabled />
                </form>
            </div>
            <div class="my-3">
                <h5>
                    Comments soon ...
                </h5>
            </div>
        </div>
    </div>
@stop
