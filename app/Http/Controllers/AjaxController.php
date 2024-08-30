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

    public function get_products_by_subcategory(Request $request){
        if ($request->ajax()) {
            return datatables()->of(Product::where('category_id', $request->subcategory_id)->get())
            ->addColumn('btn', 'admin.category._actions')
            ->rawColumns(['btn'])
            ->toJson();
        }
    }

    public function upload_image(Request $request, $id){
       
        if ($request->ajax()) {
            $post = Post::find($id);
            $urlimages = [];
            $filesLink = array();
            if($request->hasFile('files')){
                $images=$request->file('files');
                
                foreach ($images as $key => $image) {
                    $nombre = time().'_'.$image->getClientOriginalName();
                    $ruta = public_path().'/images';
                    $image->move($ruta,$nombre);
                    $urlimages[]['url']='/images/'.$nombre;
                    $url = '/images/'.$nombre;
                    array_push($filesLink,$url);
                }
            }
            $post->images()->createMany($urlimages);
            return $filesLink;
        }
    }
}
