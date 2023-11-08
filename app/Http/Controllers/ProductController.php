<?php

namespace App\Http\Controllers;

use App\Mail\Notification;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{

    private $validationRules = [
        'name'=> ["required","max:255"],
        "description"=> ["required","min:2","max:255"],
        "price"=> ["required","decimal:0,2","min:1",],
        "quantity_in_stock"=> ["required","min:0","integer"],
        "image"=> ["max:1024","image"],
        "brand_id"=> ["required","integer","min:1"],

    ];

    private $validationNames = [
        "name" => "Name",
        "price" => "Price",
        "description" => "Description",
        "quantity_in_stock" => "Quantity In Stock",
        "image" => "Product Image",
        "brand_id" => "Brand",
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::orderBy("name","desc")->paginate(2);
        $products = Product::all();
        return view("product.index")->with('products', $products);
    }

    public function showProducts()
    {
        $products = Product::all();
        return view("product.showProducts")->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('product.create')->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validationRules["image"][] = "required";
        $data = $request->validate($this->validationRules,[],$this->validationNames);

        $productImage = $request->file("image");

        try{
            // movies = the folder name where it will store
            // images = the name of the disk in filesystem.php
            $path = $productImage->store("products", 'images');

            //sending the movie to the database
            $product = new Product();
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->brand_id = $data['brand_id'];
            $product->image = $path;
            $product->price = $data['price'];
            $product->quantity_in_stock = $data['quantity_in_stock'];
            $product->save();

            //sending the movie to the database
            // Movie::create([
            //     'title' => request('title'),
            //     'description'=> request('description'),
            //     'genre' => request('genre'),
            //     'poster' => $path,
            // ]);

            return redirect()->route('admin.products.index')->with(['status'=> 'success', 'message'=> "$product->name Added Successfully "]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "$product->name Not Added"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();

        return view('product.edit')->with(['product'=> $product,'brands'=> $brands]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validationRules["image"][] = "nullable";
        $data = $request->validate($this->validationRules,[],$this->validationNames);        

        try{
            // movies = the folder name where it will store
            // images = the name of the disk in filesystem.php
            

            //sending the movie to the database
            $product = Product::findOrFail($id);
            $product->name = $data['name'];
            $product->description = $data['description'];
            if($request->hasFile('image'))
            {
                $productImage = $request->file("image");
                $path = $productImage->store("products", 'images');
                $product->image = $path;

            }

            
            $product->price = $data['price'];
            $product->brand_id = $data['brand_id'];
            $product->quantity_in_stock = $data['quantity_in_stock'];
            $product->save();

            return redirect()->route('admin.products.index')->with(['status'=> 'success', 'message'=> "$product->name Edited Successfully "]);
        }   
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "$product->name Not Edited"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Product::destroy($id);
            return redirect()->back()->with(["status" => "success","message" => "Deleted successfully"]);
        }
        catch (\Throwable $th)
        {
            // the Log is for displaying error in the laravel.log file 
            // Log::error('Deleting movie unsuccessful'. $th->getMessage());
            return redirect()->back()->with(["status" => "danger","message" => "Not deleted"]);
        }
    }

    public function sendNotification(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        // dd($id);

        Mail::to(Auth::user()->email)->send(new Notification(Auth::user()->name,collect($product)));

        return redirect()->back()->with(['status'=> 'success', 'message'=> 'We will notify you when the product is available']);



    }
}
