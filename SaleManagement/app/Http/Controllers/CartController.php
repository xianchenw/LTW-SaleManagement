<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProductToCart($id, $UserId)
    {
        $cart = Cart::where('customer_id', $UserId)->where('product_id', $id)->first();
        if ($cart) {
            Cart::where('customer_id', $UserId)->where('product_id', $id)->update(['quantity' => $cart->quantity + 1]);
        } else {
            $cart = Cart::create([
                'customer_id' => $UserId,
                'product_id' => $id,
                'quantity' => 1
            ]);
        }
        $product = Product::find($id);
        return back();
    }
    public function removeProduct($id, $UserId)
    {
        Cart::where('customer_id', $UserId)->where('product_id', $id)->delete();
        return back();
    }
}