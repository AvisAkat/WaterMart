<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        try{
            Cart::destroy($id);
            return redirect()->back()->with(["status" => "success","message" => "Removed successfully"]);
        }
        catch (\Throwable $th)
        {
            // the Log is for displaying error in the laravel.log file 
            // Log::error('Deleting movie unsuccessful'. $th->getMessage());
            return redirect()->back()->with(["status" => "danger","message" => "Unable to remove"]);
        }
    }

    public function buyItems(Request $request,String $NoOfItems)
    {
        //dd($request->item0Pid);
        
        $data = [];
        $total = 0;

        for($i = 0; $i < $NoOfItems; $i++)
        {
            $data[] = $request->validate([
                'item'.$i => ['required',"integer","min:1"]
            ],
            [
                'item'.$i.".min" => 'Quantity should be more than 1',
                'item'.$i.'.required' => 'It is required',
                'item'.$i.'.integer' => 'Should be an integer',

            ],[]);

            // CREATING THE NAME OF THE PRODUCT ID WHICH WOULD BE USED FOR RETRIVING THE PRODUCT ID PASSED IN THE HIDDEN
            $Product_id_name = "item".$i."Pid";
            // REQUESTING FOR THE PRODUCT ID 
            $productID = $request->$Product_id_name;
            // FINDING THE PRODUCT FROM THE PRODUCT MODEL
            $product = Product::findOrFail($productID);

            //OBTAINING THE PRICE OF THE PRODUCT
            $unit_price = $product->price ;

            //CALCULATING FOR THE TOTAL PRICE FOR AN ITEM
            $qty = "item".$i; // the item quantity name
            $price = $unit_price * $request->$qty;

            //FOR THE TOTAL AMOUNT OF THE ITEMS
            $total = $total + $price;



                     
    
            
        }

        

        $saleId = 0;


        try{

            $sale = new Sale();
            $sale->user_id = Auth::user()->id;            
            $sale->total_amount = $total;
            $sale->save(); 

            $saleId = $sale->id;
            

            for($i = 0; $i < $NoOfItems; $i++)
            {
    
                
                // CREATING THE NAME OF THE PRODUCT ID WHICH WOULD BE USED FOR RETRIVING THE PRODUCT ID PASSED IN THE HIDDEN
                $Product_id_name = "item".$i."Pid";
                // REQUESTING FOR THE PRODUCT ID 
                $productID = $request->$Product_id_name;
                // FINDING THE PRODUCT FROM THE PRODUCT MODEL
                $product = Product::findOrFail($productID);
    
                //OBTAINING THE PRICE OF THE PRODUCT
                $unit_price = $product->price ;
    
                //CALCULATING FOR THE TOTAL PRICE FOR AN ITEM
                $qty = "item".$i; // the item quantity name
                $price = $unit_price * $request->$qty;
    
                //FOR THE TOTAL AMOUNT OF THE ITEMS
                $total = $total + $price;

                $saleItem = new SaleItem();
                $saleItem->quantity = $request->$qty;
                $saleItem->price = $price;
                $saleItem->sale_id = $sale->id;
                $saleItem->product_id = $productID;
                $saleItem->save();
    
                
                // $cart = DB::table('carts')->where('user_id', '=', Auth::user()->id, 'AND' , 'product_id', '=', $productID)->get();

                $cart = DB::table('carts')->where('user_id', Auth::user()->id)->where('product_id', $productID)->get();
                
                Cart::destroy($cart['0']->id);
    
                         
        
                
            }

            return redirect()->back()->with(['status'=> 'success', 'message'=> 'Items Purchased successfully']);


        }
        catch (\Throwable $th)
        {
            // the Log is for displaying error in the laravel.log file 
            Log::error('buy unseccessful'. $th->getMessage());
            Sale::destroy($saleId);
            return redirect()->back()->with(["status" => "danger","message" => "Unable to purchase items.Try again later"]);
        }
        

        

       
    }
}
