<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCart extends Model
{

    public function shopping_cart_details()
    {
        return $this->hasMany(ShoppingCartDetail::class);
    }


    public static function findOrCreateBySessionId($shopping_cart_id)
    {
        $res = ShoppingCart::find($shopping_cart_id);
        if ($res) {
            return $res;
        }
        return ShoppingCart::create();
    }


    public function quantity_of_products()
    {
        return $this->shopping_cart_details->sum('quantity');
    }


    public function has_products(){
        if ($this->shopping_cart_details()->count()>0) {
            return true;
        } else {
            return false;
        } 
    }

    public function total_price(){
        $tax = Setting::find(1)->pluck('tax');
        return round(($this->subtotal() + ($this->subtotal() * $tax[0])), 2); 
    }

    public function total_tax(){
        $tax = Setting::find(1)->pluck('tax');
        return round(($this->subtotal() * $tax[0]), 2); 
    }

    public static function get_the_session_shopping_cart()
    {
        $session_name = 'shopping_cart_id';
        $shopping_cart_id = Session::get($session_name);
        $shopping_cart = self::findOrCreateBySessionId($shopping_cart_id);
        return $shopping_cart;
    }




    public function my_store($product, $request)
    {
        $this->shopping_cart_details()->create([
            'quantity' => $request->quantity,
            'price' => $product->sell_price,
            'product_id' => $product->id
        ]);
    }

    public function store_a_product($product)
    {
        $this->shopping_cart_details()->create([
            'price' => $product->sell_price,
            'product_id' => $product->id
        ]);
    }

    public function my_update($request)
    {
        foreach ($this->shopping_cart_details as $key => $detail) {
            $result[] = array("quantity" => $request->quantity[$key]);
            $detail->update($result[$key]);
        }
    }

    public function subtotal(){
        $total = 0;
        foreach ($this->shopping_cart_details as $key => $shopping_cart_detail) {
            $total += $shopping_cart_detail->total();
        }
        return round(($total), 2);
    }
}
