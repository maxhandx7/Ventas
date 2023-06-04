<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:providers.create')->only(['create', 'store']);
        $this->middleware('can:providers.index')->only(['index']);
        $this->middleware('can:providers.edit')->only(['edit', 'update']);
        $this->middleware('can:providers.show')->only(['show']);
        $this->middleware('can:providers.destroy')->only(['destroy']);
    }

    public function index()
    {
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }


    public function create()
    {
        return view('admin.provider.create');
    }


    public function store(StoreRequest $request)
    {
        try {
            Provider::create($request->all());
            return redirect()->route('providers.index')->with('success', 'Nuevo proveedor creado con éxito');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear el proveedor.');
        }
    }

    public function show(provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }


    public function edit(provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }

    public function update(UpdateRequest $request, provider $provider)
    {
        try {
            $provider->update($request->all());
            return redirect()->route('providers.index')->with('success', 'Proveedor modificado');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al modificar el proveedor ');
        }
    }


    public function destroy(provider $provider)
    {
        try {
            $provider->delete();
            return redirect()->route('providers.index')->with('success', 'Proveedor eliminado');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el proveedor ');
        }
    }
}
