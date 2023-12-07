<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;

class AddressController extends Controller
{
    public function index(){
        return new AddressCollection(Address::all());
    }
    public function show(Address $Address)
    {
        return new AddressResource($Address);
    }
    public function store(StoreAddressRequest  $request)
    {
        $validate = $request->validated();

        $Address =Address::create($validate);
        return new AddressResource($Address);
    }
    public function update(UpdateAddressRequest $request ,Address $Address  )
    {
        $validate = $request->validated();

        $Address->update($validate);
        return new AddressResource($Address);

    }
    public function destroy(Request $request ,Address $Address)
    {
        $Address->delete();
        return response()->noContent();
    }
}
