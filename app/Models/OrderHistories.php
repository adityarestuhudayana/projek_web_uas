<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistories extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
