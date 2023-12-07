<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "order_item"=>$this->order_item,
            "quantity"=>$this->quantity,
            "price"=>$this->price,
            "total"=>$this->total,
            "customer_id"=>$this->customer_id,
            "product_id"=>$this->product_id,
            "address_id"=>$this->address_id,
            "cart_id"=>$this->cart_id,

        ];
    }
}
