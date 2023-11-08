<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Sale extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'total_amount','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function formatedDate()
    {
        return Carbon::parse($this->purchased_at)->toDayDateTimeString();
    }

    public function formatedTime() {
        return  Carbon::parse($this->purchased_at)->format('h A');
    }











}
