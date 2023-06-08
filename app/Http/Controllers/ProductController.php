<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Provider;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:product.create')->only(['create', 'store']);
        $this->middleware('can:product.index')->only(['index']);
        $this->middleware('can:product.edit')->only(['edit', 'update']);
        $this->middleware('can:product.show')->only(['show']);
        $this->middleware('can:product.destroy')->only(['destroy']);

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
        dd($categories);
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));
    }


    public function store(StoreRequest $request)
    {
        
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path("/image"), $image_name);
            }
            $product = Product::create($request->all() + [
                'image' => $image_name,
            ]);
            $product->update(['code' => $product->id]);
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
        return view('admin.product.edit', compact('product', 'categories', 'providers'));
    }

    public function update(UpdateRequest $request, product $product)
    {
        try {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path("/image"), $image_name);
            }
            if (isset($image_name)) {
                $product->update($request->all() + [
                    'image' => $image_name,
                ]);
                return redirect()->route('products.index')->with('success', 'Producto modificado');
            }
            $product->update($request->all());
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
            return redirect()->back()->with('error', 'Producto inactivado');
        } else {
            $product->update(['status' => 'ACTIVE']);
            return redirect()->back()->with('success', 'Producto activado');
        }
    }
}
