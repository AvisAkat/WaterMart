<?php

namespace App\Http\Controllers;

use App\Mail\Notification;
use App\Models\Product;
use App\Models\Notification as Notify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    
    public function store(string $id)
    {
        $product = Product::findOrFail($id);
        

        Notify::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,            
        ]);

        return redirect()->back()->with(['status'=> 'success', 'message'=> 'We will notify you when the product is available']);



    }

    public function sendNotification(string $id)
    {

        $product = Product::findOrFail($id);
        
        $notifications = DB::table('notifications')->where('product_id', '=', $id)->get();
        $number_of_notify = $notifications->count();

        try{

            for ($notification = 0; $notification < $number_of_notify; $notification++) 
            {
                $notify = $notifications[$notification];
                $user = User::findOrFail($notify->user_id);
                
                Mail::to($user->email)->send(new Notification($user->name,collect($product)));
                
                
                Notify::destroy($notify->id);
                
                
                // the Log is for displaying error in the laravel.log file 
                // Log::error('Deleting movie unsuccessful'. $th->getMessage());
                
            }
            
            
            
            
            //Mail::to(Auth::user()->email)->send(new Notification(Auth::user()->name,collect($product)));
            
            return redirect()->back()->with(['status'=> 'success', 'message'=> 'All mails sent']);
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with(['status'=> 'danger','message' => 'Mails not sent']);
        }



    }
}
