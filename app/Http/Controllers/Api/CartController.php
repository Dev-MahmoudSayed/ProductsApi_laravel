<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Carts\CartResource;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Resources\Carts\CartCollection;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CartCollection(Cart::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request,Cart $Cart)
    {
        $validate = $request->validated();
        $Cart= Cart::create($validate);
        return new CartResource($Cart);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $Cart)
    {
        return new CartResource($Cart);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $Cart)
    {
        $validate = $request->validated();

        $Cart->update($validate);
        return new CartResource($Cart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $Cart)
    {
        $Cart->delete();
        return response()->noContent();
    }
}
