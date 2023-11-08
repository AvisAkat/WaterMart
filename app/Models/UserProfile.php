<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'userprofiles';

    protected $fillable = [
        'profile_pic','phone','address','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserProfilePic()
    {
        return Storage::disk('images')->url($this->profile_pic); //it is not an error
        
    }
}
