<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $newCollections = [];

    public function mount()
    {
        $this->newCollections = Product::latest()->get();
    }

    public function render()
    {
        return view('livewire.frontend.home');
    }

    public function addToCart($product_id)
    {


        if (Auth::check()) {
            // dd('here');
            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    session()->flash('cartMsg', 'Already Added to cart');
                    return redirect(route('cart'));

                    // return response()->json(['status' => $prod_check->name . "Already Added to cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->image = $prod_check->image;
                    $cartItem->price = $prod_check->price;
                    $cartItem->quantity = 1;
                    $cartItem->save();
                    // return redirect(url('/cart'));
                    //return response()->json(['status' => $prod_check->name . "Added to cart"]);
                }
            }
            return redirect(url('/cart'));
        } else {
            // return response()->json(['status' => "Login to Continue"]);
            return redirect(url('/cart'));
        }
        return redirect(route('cart'));
    }
}
