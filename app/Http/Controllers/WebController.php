<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function checkout()
    {
        return view('web.checkout');
    }

    public function aboutUs()
    {
        return view('web.aboutUs');
    }

    public function blogDetails()
    {
        return view('web.blogDetails');
    }

    public function blog()
    {
        return view('web.blog');
    }

    public function cart()
    {
        return view('web.cart');
    }

    public function contactUs()
    {
        return view('web.contactUs');
    }

    public function loginRegister()
    {
        return view('web.loginRegister');
    }

  

    public function productsDetails(Product $product)
    {
        return view('web.productsDetails', compact('product'));
    }

    public function shopGrid()
    {
        $products = (new Product())->get_products_active()->paginate(12); 
        return view('web.shopGrid', compact('products'));
    }

    public function welcome()
    {
        return view('welcome');
    }
}
