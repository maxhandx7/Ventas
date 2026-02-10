<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Product extends Model
{


    protected $fillable = [
        'code',
        'name',
        'slug',
        'stock',
        'short_description',
        'long_description',
        'sell_price',
        'status',
        'category_id',
        'provider_id',
    ];

    public function add_stock($quantity)
    {
        $this->increment('stock', $quantity);
    }
    public function subtract_stock($quantity)
    {
        $this->decrement('stock', $quantity);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

   

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function my_store($request)
    {
        $product = self::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sell_price' => $request->sell_price,
            'category_id' => $request->category_id,
            'provider_id' => $request->provider_id,
        ]);
        $product->tags()->attach($request->get('tags'));
        $this->GenerarCodigo($product);
        $this->upload_files($request, $product);
    }

    public function my_update($request)
    {
        $this->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'sell_price' => $request->sell_price,
            'category_id' => $request->category_id,
            'provider_id' => $request->provider_id,
        ]);
        $this->tags()->sync($request->get('tags'));
        $this->GenerarCodigo($this);
    }

    public function GenerarCodigo($product)
    {
        $numero = $product->id;
        $numeroConCero = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code' => $numeroConCero]);
    }

    public function upload_files($request, $product)
    {
        $urlImages = [];

        if ($request->hasFile('images')) {

            $images = $request->file('images');

            foreach ($images as $image) {
                $nombre = time() . $image->getClientOriginalName();
                $ruta = public_path() . '/image';
                $image->move($ruta, $nombre);
                $urlImages[]['url'] = '/image/' . $nombre;
            }
            $product->images()->createMany($urlImages);
        }
    }

    public function get_products_active()
    {
        return self::where('status', 'ACTIVE')->orderBy('id', 'desc');
    }


    public function product_status()
    {
        switch ($this->status) {
            case 'DRAFT':
                return 'BORRADOR';
            case 'SHOP':
                return 'TIENDA';
            case 'POS':
                return 'PUNTO DE VENTA';
            case 'BOTH':
                return 'AMBOS';
            case 'DISABLED':
                return 'DESACTIVADO';
            default:
                # code...
                break;
        }
    }


   public function storeFromWooCommerce($wooProduct)
{
    $categoryId = null;
    if (!empty($wooProduct['categories'])) {
        foreach ($wooProduct['categories'] as $wooCat) {
            $category = \App\Category::firstOrCreate(
                ['slug' => $wooCat['slug']],
                [
                    'name' => $wooCat['name'],
                    'category_type' => 'PRODUCT',
                ]
            );
            if (!$categoryId) $categoryId = $category->id;
        }
    }

    $product = self::updateOrCreate(
        ['slug' => $wooProduct['slug']],
        [
            'name'              => $wooProduct['name'],
            'short_description' => $wooProduct['short_description'],
            'long_description'  => $wooProduct['description'],
            'sell_price'        => $wooProduct['price'] ?? 0,
            'stock'             => $wooProduct['stock_quantity'] ?? 0,
            'status'            => 'ACTIVE', 
            'category_id'       => $categoryId, // ID recién creado o encontrado
            'provider_id'       => 1, 
        ]
    );

    $this->GenerarCodigo($product);

    if (!empty($wooProduct['tags'])) {
        $tagIds = [];
        foreach ($wooProduct['tags'] as $wooTag) {
            $tag = \App\Tag::firstOrCreate(
                ['slug' => $wooTag['slug']],
                ['name' => $wooTag['name']]
            );
            $tagIds[] = $tag->id;
        }
        $product->tags()->sync($tagIds);
    }

    if (!empty($wooProduct['images'])) {
        $product->images()->delete(); // Limpiar previas si es actualización
        $urlImages = collect($wooProduct['images'])->map(fn($img) => ['url' => $img['src']])->toArray();
        $product->images()->createMany($urlImages);
    }

    return $product;
}


    

    public function syncWooCategories(array $wooCategories)
    {
        $lastId = null;

        foreach ($wooCategories as $wooCat) {
            $category = \App\Category::firstOrCreate(
                ['slug' => $wooCat['slug']],
                [
                    'name' => $wooCat['name'],
                    'category_type' => 'PRODUCT',
                    'description' => 'Sincronizado desde WooCommerce',
                ]
            );
            if (!$lastId) {
                $lastId = $category->id;
            }
        }

        return $lastId;
    }
}
