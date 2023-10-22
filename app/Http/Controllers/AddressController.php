<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Repositories\AddressRepository;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAddressRequest $request)
    {
        $address = [];
        $address['cep'] = $request->cep;
        $address['address'] = $request->address;
        $address['number'] = $request->number;
        $address['complement'] = $request->complement;
        $address['neighborhood'] = $request->neighborhood;
        $address['city'] = $request->city;
        $address['UF'] = $request->state;
        $address['object_id'] = $request->object_id;
        $address['object_type'] = $request->object_type;
        $address['user_id'] = $request->object_id;
        try {
            Address::create($address);
            return response()->json(['message' => 'success'],200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($user, $object, $type)
    {
        
      try {
        $address = new AddressRepository;
        return $address->getData($user, $object, $type);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request )
    {
        try {
            $address = new AddressRepository;            
            $address->getData($request->object_id, $request->object_id, $request->object_type)->update($request->all());          
            return response()->json(['message' => 'success'],200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }
}
