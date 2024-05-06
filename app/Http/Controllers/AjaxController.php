<?php

namespace App\Http\Controllers;

use App\Image as ImageApp;
use App\Product;
use Illuminate\Http\Request;
use App\Post;
use App\Subcategory;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{
    public function get_subcategories(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = Subcategory::where('category_id',
            $request->category)->get();
            return response()->json($subcategories);
        }
    }
}
