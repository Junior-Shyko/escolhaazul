<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentalDataRequest;
use App\Http\Requests\UpdateRentalDataRequest;
use Illuminate\Http\Request;
use App\Models\RentalData;

class RentalDataController extends Controller
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
    public function store(StoreRentalDataRequest $request)
    {
        dump($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(RentalData $rentalData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentalData $rentalData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentalDataRequest $request)
    {

        try {
            $idRental = $request->proposal_id;
            unset($request['proposal_id']);
           
            $rental = new RentalData;
            $rental->where('id', $idRental)->update($request->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentalData $rentalData)
    {
        //
    }
}
