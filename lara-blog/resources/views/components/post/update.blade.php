@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            {{ "Edit your post " . $post->user->name }}
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="p-5 mt-2">
            <form action="{{ route('update.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}" />
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="titleForm">Post title</label>
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            id="titleForm"
                            aria-describedby="emailHelp"
                            placeholder="Enter title ..."
                            value="{{ $post->title }}"
                        />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="postContent">Content</label>
                        <textarea
                            id="postContent"
                            class="form-control"
                            name="content"
                            placeholder="Write the body ..."
                        >{{ $post->content }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="tags" class="form-label">Tags</label>
                        <div>
                            <select id="tags" class="form-select w-100" size="3" name="tags_id[]" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="categories" class="form-label">Categories</label>
                        <div>
                            <select id="categories" class="form-select w-100" size="3" name="categories_id[]" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="my-4">
                    @if($post->image)
                        <img
                            src="{{ str_starts_with($post->image->path, 'http') ? $post->image->path : asset('storage/' . $post->image->path) }}"
                            alt="{{ $post->image->alt }}" width="200"/>
                    @else
                        <div class="h4">No image</div>
                    @endif
                </div>
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="categories" class="form-label">Category image (optional)</label>
                        <input type="file" class="form-control" name="file" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="allow">Enable Comments:</label>
                        <input id="allow" type="checkbox" name="allow_comments" />
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary mr-1">Change</button>
                    <a type="button" href="{{ route('view.post', $post->id) }}" class="btn btn-danger ml-1">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@stop

