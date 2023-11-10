<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('cart.index')->with('carts', $carts);
    }

    public function store(String $id)
    {
        $product_id = $id;
        

        
        $product = Cart::where('product_id', '=', $product_id)->where('user_id', '=', Auth::user()->id)->get();
       

        if ($product->isEmpty()) 
        {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product_id,            
            ]);

            
        }

        return redirect()->back()->with(['status'=> 'success', 'message'=> 'Added to cart successfully']);


    }

    public function destroy(String $id)
    {
        
    }
}
