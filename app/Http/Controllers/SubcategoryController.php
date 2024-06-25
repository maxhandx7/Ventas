<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Subcategory\StoreRequest;
use App\Http\Requests\Subcategory\UpdateRequest;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subcategories = Subcategory::get();
        return view('admin.subcategory.index', compact('subcategories'));
    }


    public function create()
    {
        return view('admin.subcategory.create');
    }


    public function store(StoreRequest $request, Subcategory $subcategory)
    {
        try {
            $subcategory->my_store($request);
            return redirect()->back()->with('success', 'Subcategoria credada con éxito');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear la subcategoria');
        }
    }

    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategory.show', compact('subcategory'));
    }


    public function edit(Category $category, Subcategory $subcategory)
    {
        return view('admin.subcategory.edit', compact('category', 'subcategory'));
    }

    public function update(UpdateRequest $request, Category $category, Subcategory $subcategory)
    {
        try {
            $subcategory->my_update($request);
            return redirect()->route('categories.show', $category)->with('success', 'Subcategoria modificada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la subcategoria');
        }
    }


    public function destroy(Subcategory $subcategory)
    {
        try {
            $subcategory->delete();
            return redirect()->back()->with('success', 'Subcategoria eliminada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar la subcategoria');
        }
    }
}
