<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class TagController
 * @package App\Http\Controllers
 */
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('components.admin.tags')
            ->with('tags', $tags)
            ->with('title', 'tags');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('components.admin.content.create_tag')
            ->with('title', 'tag - create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTagRequest $request
     * @return RedirectResponse
     */
    public function store(CreateTagRequest $request): RedirectResponse
    {
        Tag::query()->create($request->validated());
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $tag = Tag::query()->findOrFail($id);
        return view('components.public.tag')
            ->with('tag', $tag)
            ->with('title', 'tag - view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $tag = Tag::query()->findOrFail($id);
        return view('components.admin.content.edit_tag')
            ->with('tag', $tag)
            ->with('title', 'tag - edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateTagRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CreateTagRequest $request, $id): RedirectResponse
    {
        Tag::query()->find($id)->update($request->validated());
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Tag::query()->findOrFail($id)->delete();
        return redirect()->route('tags.index');
    }
}
