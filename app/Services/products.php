<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;

class Products
{
    use ConsumesExternalServices;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.products.base_uri');
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function getProducts()
    {
        return $this->makeRequest('GET', '/products');
    }

    
}