<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomerCollection;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;

class CustomerController extends Controller
{
    public function index(){
        return new CustomerCollection(Customer::all());
    }
    public function show(Customer $Customer)
    {
        return new CustomerResource($Customer);
    }
    public function store(StoreCustomerRequest  $request)
    {
        $validate = $request->validated();

        $Customer =Customer::create($validate);
        return new CustomerResource($Customer);
    }
    public function update(UpdateCustomerRequest $request ,Customer $Customer  )
    {
        $validate = $request->validated();

        $Customer->update($validate);
        return new CustomerResource($Customer);

    }
    public function destroy(Request $request ,Customer $Customer)
    {
        $Customer->delete();
        return response()->noContent();
    }
}
