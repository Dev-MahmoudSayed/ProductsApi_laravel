<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'cart_items','quantity','customer_id','product_id'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
