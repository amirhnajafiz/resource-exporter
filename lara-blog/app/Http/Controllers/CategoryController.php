<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\file\FileCreate;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    use FileCreate;

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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $category = Category::query()->create($request->all());

        if ($request->file('file')) {
            $name = $category->id . "_image." . $request->file('file')->extension();
            $this->storeFile('categories', $name, $request->file('file'));

            $category->image()->create([
                'title' => $request->input('title'),
                'alt' => $category->slug,
                'path' => \Illuminate\Support\Facades\URL::to('/') . '/storage/categories/' . $name
            ]);
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $category = Category::query()->find($id);
        return view('components.admin.content.edit_category')
            ->with('category', $category)
            ->with('title', 'edit - category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        Category::query()->find($id)->update($request->all());
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
        Category::query()->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
