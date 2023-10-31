<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Services\ProposalService;

class PropertyController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $proporty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $proporty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $proporty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $proporty)
    {
        //
    }

    public function createOrUpdate(Request $request)
    {
        $commercial = new Property;
        ProposalService::createOrUpdate($commercial, $request);
    }
}
