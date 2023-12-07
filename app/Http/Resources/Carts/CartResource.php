<?php

namespace App\Http\Resources\Carts;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "cart_items"=>$this->cart_items,
            "quantity"=>$this->quantity,
            "customer_id"=>$this->customer_id,
            "product_id"=>$this->product_id,


        ];
    }
}
