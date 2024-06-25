<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clients = User::role('Client')->get();
        return view('admin.client.index', compact('clients'));
    }


    public function create()
    {
        return view('admin.client.create');
    }


    public function store(Request $request)
    {
        try {
            User::create($request->all())->assignRole('Client');
            if ($request->sale == 1) {
                return redirect()->back();
            }
            return redirect()->route('clients.index')->with('success', 'Nuevo cliente creado con éxito');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear el cliente');
        }
    }

    public function show(User $client)
    {
        $total_purchases = 0;
        foreach ($client->sales as $key => $sale) {
            $total_purchases += $sale->total;
        }
        return view('admin.client.show', compact('client', 'total_purchases'));
    }


    public function edit(User $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, User $client)
    {
        try {
            $client->update($request->all());
            return redirect()->route('clients.index')->with('success', 'Cliente modificado');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al modificar el cliente ');
        }
    }


    public function destroy(User $client)
    {
        try {
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'Cliente eliminado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el cliente ');
        }
    }
}
