<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('can:clients.create')->only(['create', 'store']);
        $this->middleware('can:clients.index')->only(['index']);
        $this->middleware('can:clients.edit')->only(['edit', 'update']);
        $this->middleware('can:clients.show')->only(['show']);
        $this->middleware('can:clients.destroy')->only(['destroy']);
    }
    public function index()
    {
        $clients = Client::get();
        return view('admin.client.index', compact('clients'));
    }


    public function create()
    {
        return view('admin.client.create');
    }


    public function store(StoreRequest $request)
    {
        try {
            Client::create($request->all());
            return redirect()->route('clients.index')->with('success', 'Nuevo cliente creado con éxito');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear el cliente');
        }
    }

    public function show(client $client)
    {
        return view('admin.client.show', compact('client'));
    }


    public function edit(client $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(UpdateRequest $request, client $client)
    {
        try {
            $client->update($request->all());
            return redirect()->route('clients.index')->with('success', 'Cliente modificado');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al modificar el cliente ');
        }
    }


    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el cliente ');
        }
    }
}