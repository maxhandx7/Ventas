<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:categories.create')->only(['create','store']);
        $this->middleware('can:categories.index')->only(['index']);
        $this->middleware('can:categories.edit')->only(['edit','update']);
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

 
    public function store(StoreRequest $request)
    {
       Category::create($request->all());

       return redirect()->route('categories.index')->with('success', 'Categoria credada con éxito');
    }

    public function show(category $category)
    {
        return view('admin.category.show', compact('category'));
    }

 
    public function edit(category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, category $category)
    {
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Categoria modificado');
    }

 
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
