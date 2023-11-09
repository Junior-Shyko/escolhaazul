<?php

namespace App\Http\Controllers;

use App\Models\Guarantor;
use App\Http\Services\ProposalService;
use App\Http\Requests\StoreGuarantorRequest;
use App\Http\Requests\UpdateGuarantorRequest;

class GuarantorController extends Controller
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
    public function store(StoreGuarantorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Guarantor $guarantor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guarantor $guarantor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuarantorRequest $request, Guarantor $guarantor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guarantor $guarantor)
    {
        //
    }

    public function createOrUpdate(UpdateGuarantorRequest $request)
    {
        $guarantor = new Guarantor;
        ProposalService::createOrUpdate($guarantor, $request);
    }
}
