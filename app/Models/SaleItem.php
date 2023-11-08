<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class SaleItem extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'saleitems';

    protected $fillable = [
        'quantity','price','sale_id','product_id',
    ];


    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
