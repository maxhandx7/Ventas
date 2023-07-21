<?php

namespace App\Http\Controllers;

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
            Subcategory::create($request->all());
            return redirect()->route('subcategories.index')->with('success', 'Categoria credada con éxito');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear la categoria');
        }
    }

    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategory.show', compact('subcategory'));
    }


    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    public function update(UpdateRequest $request, Subcategory $subcategory)
    {
        try {
            $subcategory->my_update($request);
            return redirect()->route('subcategories.index')->with('success', 'Categoria modificada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la categoria');
        }
    }


    public function destroy(Subcategory $subcategory)
    {
        try {
            $subcategory->delete();
            return redirect()->route('subcategories.index')->with('success', 'Categoria eliminada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar la categoria');
        }
    }
}
