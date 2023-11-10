<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        return view('profiles.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validationRules = [
            'name'=> ["required","max:255"],
            "email"=> ["required","email","max:255", "unique:users,email,$id"],
            "phone"=> ["max_digits:9","integer","nullable"],
            "address"=> ["max:225"],
            "profile_pic"=> ["max:1024","image", "nullable"],
    
        ];
    
        $validationNames = [
            "phone" => "phone number",
            "profile_pic" => "profile picture"
            
        ];
        $validationMessage = [
            "phone.integer" => "your phone number should not begin with 0",
            
        ];


        $data = $request->validate($validationRules,$validationMessage,$validationNames);

        // try{
            // movies = the folder name where it will store
            // images = the name of the disk in filesystem.php
            

            //sending the movie to the database
            $user = User::findOrFail($id);
            $profile = User::findOrFail($id)->userProfile;
            
            $user->name = $data['name'];
            $user->email = $data['email'];


            if($request->hasFile('profile_pic'))
            {
                $userImage = $request->file("profile_pic");
                $path = $userImage->store("users", 'images');
                $profile->profile_pic = $path;

            }

            
            $profile->address = $data['address'];
            $profile->phone = $data['phone'];
            $user->save();
            $profile->save();

            return redirect()->back()->with(['status'=> 'success', 'message'=> "Profile Edited Successfully "]);
        // }   
        // catch (\Exception $e)
        // {
        //     return redirect()->back()->with(['status'=> 'danger', 'message'=> "Profile Not Edited"]);
        // }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
