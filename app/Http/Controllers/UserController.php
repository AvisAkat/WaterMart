<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $validationRules = [
        'name'=> ["required","max:255"],
        "email"=> ["required","email","max:255",],
        "password"=> ["required","confirmed","min:6","max:255"],
        "role"=> ["required","max:9"],
        "status"=> ["required","max:11"],
        // "phone"=> ["required","max_digits:9","integer"],
        // "address"=> ["required","max:225"],
        // "profile_pic"=> ["max:1024","image"],

    ];

    private $validationNames = [
        // "phone" => "phone number",
    // "profile_pic" => "profile picture"
        
    ];
    private $validationMessage = [
        "password.confirmed" => "password and confirm password do not match",
        // "phone.integer" => "your phone number should not begin with 0",
        
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validationRules["profile_pic"][] = "required";
        //'role_id' => Rule::excludeIf($request->user()->is_admin)
        //$this->validationRules["password_confirmation"][] = "required";
        $this->validationRules["email"][] = "unique:users,email";
        $this->validationRules["password_confirmation"][] = "required";
        $this->validationNames["password_confirmation"] = "Confirm Password";

        $request->validate($this->validationRules,$this->validationMessage,$this->validationNames);

        // $profilePic = $request->file("profile_pic");

        
        try{
            // users = the folder name where it will store
            // images = the name of the disk in filesystem.php
            // $path = $profilePic->store("users", 'images');

            //sending the movie to the database
            // $product = new Product();
            // $product->name = $data['name'];
            // $product->description = $data['description'];
            // $product->brand_id = $data['brand_id'];
            // $product->image = $path;
            // $product->price = $data['price'];
            // $product->quantity_in_stock = $data['quantity_in_stock'];
            // $product->save();

            // sending the movie to the database
            User::create([
                'name' => request('name'),
                'email'=> request('email'),
                'role' => request('role'),
                'status' => request('status'),
                'password' => request('password'),
            ]);

            // UserProfile::create([
            //     'user_id' => request('id'),
            //     'address'=> request('address'),
            //     'profile_pic' => $path,
            //     'phone' => "0".request('phone'),
                
            // ]);

            return redirect()->route('admin.users.index')->with(['status'=> 'success', 'message'=> " $request->name Added Successfully "]);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "$request->name Not Added"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $users = User::find($id);
        // return view("users.edit")->with("user", $users);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view("users.edit")->with("user", $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$this->validationRules["profile_pic"][] = "nullable";
        $this->validationRules["email"][] = "unique:users,email,$id";
        unset($this->validationRules["password"]);
        
        
        $data = $request->validate($this->validationRules,[],$this->validationNames);
        
        //$data = $request->validate($this->validationRules,[],$this->validationNames);        
        

        try{
            // movies = the folder name where it will store
            // images = the name of the disk in filesystem.php
            

            //sending the movie to the database
            $user = User::findOrFail($id);
            $user->name = $data['name'];
            $user->email = $data['email'];


            // if($request->hasFile('profile_pic'))
            // {
            //     $userImage = $request->file("profile_pic");
            //     $path = $userImage->store("users", 'images');
            //     $user->profile_pic = $path;

            // }

            
            $user->status = $data['status'];
            $user->role = $data['role'];
            $user->save();

            return redirect()->route('admin.users.index')->with(['status'=> 'success', 'message'=> "$user->name Edited Successfully "]);
        }   
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger', 'message'=> "$user->name Not Edited"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            User::destroy($id);
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
