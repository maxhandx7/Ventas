<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:providers.create')->only(['create','store']);
        $this->middleware('can:providers.index')->only(['index']);
        $this->middleware('can:providers.edit')->only(['edit','update']);
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
       Provider::create($request->all());
        
       return redirect()->route('providers.index')->with('success', 'Nuevo proveedor creado con éxito');
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
        $provider->update($request->all());

        return redirect()->route('providers.index')->with('success', 'Proveedor modificado');
    }

 
    public function destroy(provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
    }
}
