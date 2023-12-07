<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "order_item"=>"required|numeric",
            "quantity"=>"required|numeric",
            "price"=>"required|numeric",
            "total"=>"required|numeric",
            "address_id"=>"required|numeric",
            "customer_id"=>"required|numeric",
            "product_id"=>"required|numeric",
            "cart_id"=>"required|numeric",

        ];
    }
}
