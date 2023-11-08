<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Storage;


class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name','description','price','image','quantity_in_stock','manufacture_id'
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getProductImage()
    {
        return Storage::disk('images')->url($this->image); //it is not an error
        
    }
}
