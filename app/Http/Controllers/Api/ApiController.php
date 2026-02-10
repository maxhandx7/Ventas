<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
  

    public function api()
    {
        $response = Http::withBasicAuth(
            env('WC_KEY'),
            env('WC_SECRET')
        )->get(env('WC_URL') . '/wp-json/wc/v3/products');
        return $response->json();
    }
}
