<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    private $validationRules = [
        'brand_name'=> ["required","max:255"],
    ];

    private $validationNames = [
        "brand_name" => "brand name",
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules,[],$this->validationNames);


        try{
            //sending the movie to the database
            $brand = new Brand();
            $brand->brand_name = $data['brand_name'];
            $brand->save();

            return redirect()->route('admin.brands.index')->with(['status'=> 'success', 'message'=> "$brand->brand_name Added Successfully "]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "$brand->brand_name Not Added"]);
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
        
        $brand = Brand::findOrFail($id);

        return view('brands.edit')->with(['brand'=> $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = $request->validate($this->validationRules,[],$this->validationNames);        

        try{
            // movies = the folder name where it will store
            // images = the name of the disk in filesystem.php
            

            //sending the movie to the database
            $brand = Brand::findOrFail($id);
            $brand->brand_name = $data['brand_name'];
            $brand->save();

            return redirect()->route('admin.brands.index')->with(['status'=> 'success', 'message'=> "Edited Successfully "]);
        }   
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "Not Edited"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Brand::destroy($id);
            return redirect()->back()->with(["status" => "success","message" => "Deleted successfully"]);
        }
        catch (\Throwable $th)
        {
            // the Log is for displaying error in the laravel.log file 
            // Log::error('Deleting movie unsuccessful'. $th->getMessage());
            return redirect()->back()->with(["status" => "danger","message" => "Not deleted"]);
        }
    }
}
