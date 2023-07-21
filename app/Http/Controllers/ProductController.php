<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Provider;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Subcategory;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:products.create')->only(['create', 'store']);
        $this->middleware('can:products.index')->only(['index']);
        $this->middleware('can:products.edit')->only(['edit', 'update']);
        $this->middleware('can:products.show')->only(['show']);
        $this->middleware('can:products.destroy')->only(['destroy']);

        $this->middleware('can:change.status.products')->only(['change_status']);
    }

    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        $tags = Tag::all();
        return view('admin.product.create', compact('categories', 'providers', 'tags'));
    }


    public function store(StoreRequest $request, Product $product)
    {

        try {
            /* if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path("/image"), $image_name);
            } */
            /* if (empty($image_name)) {
                $defaultImage = 'system/default.jpg';
                $product = Product::create($request->except('image') + [
                    'image' => $defaultImage,
                ]);
            } else {
                $product->my_store($request);
                $product = Product::create($request->all() + [
                    'image' => $image_name,
                ]);

                if ($request->code == "") {
                    $numero = $product->id;
                    $numeroConCero = str_pad($numero, 8, "0", STR_PAD_LEFT);
                    $product->update(['code' => $numeroConCero]);
                }
            } */

            $lol = $product->my_store($request);
            return redirect()->route('products.index')->with('success', 'Producto creado con éxito');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al crear el producto.');
        }
    }

    public function show(product $product)
    {
        return view('admin.product.show', compact('product'));
    }


    public function edit(product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        $tags = Tag::all();
        $subcategories = Subcategory::get();
        return view('admin.product.edit', compact('product', 'categories', 'providers', 'tags', 'subcategories'));
    }

    public function update(UpdateRequest $request, product $product)
    {
        try {
            
            $product->my_store($request);
            
            return redirect()->route('products.index')->with('success', 'Producto modificado');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al modificar el producto.');
        }
    }


    public function destroy(product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Producto eliminado');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar el cliente.');
        }
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status' => 'DESACTIVATED']);
            return redirect()->back()->with('info', 'Producto inactivado');
        } else {
            $product->update(['status' => 'ACTIVE']);
            return redirect()->back()->with('info', 'Producto activado');
        }
    }

    public function upload_image(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ( $request->hasFile('image')) {
            $file =  $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $urlImages = '/image/' . $image_name;
        } 
        $product->images()->create([
            'url' => $urlImages,
        ]);
    }
}
