<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataPersonalRequest;
use App\Http\Requests\UpdateDataPersonalRequest;
use App\Models\DataPersonal;

class DataPersonalController extends Controller
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
    public function store(StoreDataPersonalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPersonal $dataPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPersonal $dataPersonal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataPersonalRequest $request)
    {
       
       try {
        $personal = DataPersonal::where('user_id', $request->user_id)->first();
       $personal->update($request->all());
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPersonal $dataPersonal)
    {
        //
    }
}
