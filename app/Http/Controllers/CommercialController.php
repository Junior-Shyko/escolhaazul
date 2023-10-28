<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommercialRequest;
use App\Http\Requests\UpdateCommercialRequest;
use App\Http\Services\ProposalService;
use App\Models\Commercial;

class CommercialController extends Controller
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
    public function store(StoreCommercialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Commercial $commercial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commercial $commercial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommercialRequest $request, Commercial $commercial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commercial $commercial)
    {
        //
    }

    public function createOrUpdate(UpdateCommercialRequest $request)
    {
        $commercial = new Commercial;
        ProposalService::createOrUpdate($commercial, $request);
    }
}
