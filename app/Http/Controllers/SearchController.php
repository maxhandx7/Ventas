<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Provider;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', '%' . $query . '%')
                   ->orWhere('code', 'LIKE', '%' . $query . '%')
                   ->get();
        $users = User::where('name', 'LIKE', '%' . $query . '%')->get();
        $clients = Client::where('name', 'LIKE', '%' . $query . '%')->get();
        $providers = Provider::where('name', 'LIKE', '%' . $query . '%')->get();
        return view('search.results', compact('products', 'users', 'clients', 'providers', 'query'));
    }
}
