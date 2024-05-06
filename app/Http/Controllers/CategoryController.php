<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Subcategory;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:categories.create')->only(['create', 'store']);
        $this->middleware('can:categories.index')->only(['index']);
        $this->middleware('can:categories.edit')->only(['edit', 'update']);
        $this->middleware('can:categories.show')->only(['show']);
        $this->middleware('can:categories.destroy')->only(['destroy']);
    }

    public function index()
    {
        $categories = Category::get();

        return view('admin.category.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(StoreRequest $request, Category $category)
    {
        try {
            $category->my_store($request);
            return redirect()->route('categories.index')->with('success', 'Categoria credada con éxito');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear la categoria');
        }
    }

    public function show(Category $category)
    {
        $subcategories = $category->subcategories;
        return view('admin.category.show', compact('category', 'subcategories'));
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        try {
            $category->my_update($request);
            return redirect()->route('categories.index')->with('success', 'Categoria modificada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la categoria');
        }
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Categoria eliminada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar la categoria');
        }
    }
}
