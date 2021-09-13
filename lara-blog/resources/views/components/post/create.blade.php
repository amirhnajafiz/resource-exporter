@extends('layouts.main')

@section('content')
    <div class="w-50 m-auto text-dark bg-light rounded" style="margin-top: 150px !important;">
        <h3
            class="text-center bg-dark text-light rounded py-3 mb-0"
            style="border-bottom-left-radius: 0 !important; border-bottom-right-radius: 0 !important;"
        >
            Create a new post
        </h3>
        @if($errors->any())
            <x-error-box></x-error-box>
        @endif
        <div class="text-primary text-center my-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-pencil-fill"
                 viewBox="0 0 16 16">
                <path
                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>
        </div>
        <div class="p-5 mt-2">
            <form action="{{ route('create.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}"/>
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
                            value="{{ old('title') }}"
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
                        ></textarea>
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
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="d-inline-block col-12">
                        <label for="categories" class="form-label">Post image (optional)</label>
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
                    <button type="submit" name="submit" class="btn btn-success mr-1">Publish</button>
                    <button type="submit" name="draft" class="btn btn-warning mr-1 ml-1">Draft</button>
                    <button type="reset" class="btn btn-danger ml-1">Reset</button>
                </div>
            </form>
        </div>
    </div>
@stop
