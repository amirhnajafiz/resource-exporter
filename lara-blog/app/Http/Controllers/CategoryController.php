<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\file\FileCreate;
use App\Http\Controllers\traits\file\FileDestroy;
use App\Http\Controllers\traits\file\FileReplace;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    use FileCreate, FileDestroy, FileReplace;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('components.admin.categories')
            ->with('categories', $categories)
            ->with('title', 'categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('components.admin.content.create_category')
            ->with('title', 'category - create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        $category = Category::query()->create($request->validated());

        if ($request->file('file')) {
            $name = $category->id . "_image." . $request->file('file')->extension();
            $this->storeFile('categories', $name, $request->file('file'));

            $category->image()->create([
                'title' => $request->input('title'),
                'alt' => $category->slug,
                'path' => 'categories/' . $name
            ]);
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $category = Category::query()->findOrFail($id);
        return view('components.public.category')
            ->with('category', $category)
            ->with('title', 'category - view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        return view('components.admin.content.edit_category')
            ->with('category', $category)
            ->with('title', 'edit - category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CreateCategoryRequest $request, $id): RedirectResponse
    {
        $category = Category::query()->findOrFail($id);
        $category->update($request->validated());
        if ($request->file('file')) {  // Saving category image
            $oldName = $category->image ? $category->image->path : '';
            $name = $category->id . "_image." . $request->file('file')->extension();
            $this->replaceFile('categories/', $name, $request->file('file'), $oldName);
            $category->image()->update([ // Database storing
                'path' => 'categories/' . $name
            ]);
        }
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $image = Category::query()->findOrFail($id)->image->path;
        $this->destroyFile($image); // Storage image delete
        $image->delete(); // Database delete
        Category::query()->find($id)->delete(); // Category delete
        return redirect()->route('categories.index');
    }
}
