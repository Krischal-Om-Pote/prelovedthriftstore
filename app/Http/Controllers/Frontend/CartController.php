<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        echo $product_id, $product_qty;
        die();
        if (Auth::check()) {
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . "Already Added to cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->quantity = $product_id;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . "Added to cart"]);
                }
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
    public function viewcart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('layouts.inc.frontend.products.cart', compact('cartitems'));
    }
}
