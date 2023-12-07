<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderResource;
use App\Http\Resources\Orders\OrderCollection;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;

class OrderController extends Controller
{


    public function index()
    {
        return new OrderCollection(Order::all());
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
    public function store(StoreOrderRequest $request,Order $Order)
    {
        $validate = $request->validated();
        $Order= Order::create($validate);
        return new OrderResource($Order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $Order)
    {
        return new OrderResource($Order);
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
    public function update(UpdateOrderRequest $request, Order $Order)
    {
        $validate = $request->validated();

        $Order->update($validate);
        return new OrderResource($Order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $Order)
    {
        $Order->delete();
        return response()->noContent();
    }
}
