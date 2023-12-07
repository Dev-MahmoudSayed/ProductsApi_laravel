<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'order_item','quantity','customer_id','product_id','price','total','cart_id','address_id'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
