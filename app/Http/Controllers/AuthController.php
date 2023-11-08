<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    public function getSigninForm()
    {
        return view('auth.registerForm')->with(['active' => false]);
    }

    public function getSignupForm()
    {
        return view('auth.registerForm')->with(['active' => true]);
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required','min:6','max:255', 'confirmed'],
            'password_confirmation' => ['required'],
        ],
        [
            'password.confirmed' => 'Password must much Confirm Password',
        ],
        [
            'name' => 'Name',
            'email' => 'Email',
            'password'=> 'Password',
            'password_confirmation' => 'Password Confirmation',
        ]);


       
        try{

            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->remember_token = Str::random(40);
            $user->save();

          

            UserProfile::create([
                'user_id' => $user->id,                
            ]);

            Mail::to($user->email)->send(new VerifyMail($user->remember_token,$data));

            
            return redirect(route('auth.signin'))->with(['status' => 'success', 'message' => 'Registration successfull, go to your email account to verify your email']);
        }
        catch (\Throwable $th)
        {
            User::destroy($user->id);
            return redirect(route('auth.signup'))->with(['status' => 'danger', 'message' => 'User registration was not successful. Try again later']);
        }

    }

    public function verify($token)
    {
        $user = User::where('remember_token', '=' ,$token)->first();
        if(!empty($user))
        {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect(route('auth.signin'))->with(['status'=> 'success','message'=>'Your account has been successfully verified']);
        }
        else
        {
            User::destroy($user->id);
            abort(404);
        }
    }

    public function signinUser(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email','max:255'],
            'password' => ['required','max:255',],

        ]);
    



        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials))
        {
        
            if(Auth::user()->status == 'active' && Auth::user()->email_verified_at < date('Y-m-d H:i:s')) 
            {
                $request->session()->regenerate();   
            }

            if(Auth::user()->email_verified_at > date('Y-m-d H:i:s') || Auth::user()->email_verified_at == '')
            {
                $request->session()->invalidate();   
                return redirect(route('auth.signin'))->with([
                    'status' => 'danger', 'message' => 'You have not verified your email'
                ]);      
            }

            if(Auth::user()->status == 'inactive')
            {
                $request->session()->invalidate();   
                return redirect(route('home'))->with([
                    'status' => 'danger', 'message' => 'You have been blocked from this site. See admin for further details.'
                ]);      
            }


            return redirect(route('customer.products'))->with(['status'=> 'success', 'message'=> 'Login Successfully']);
        }
        else
        {
            return redirect()->back()->withInput()->with(['status' => 'danger','message' => 'Email/Password is incorrect']);
        }
    }

    public function logoutUser(Request $request)
    {
        $request->session()->invalidate();
        return redirect(route('home'))->with([
            'status' => 'info', 'message' => 'Logout successful'
        ]);        
    }
}
