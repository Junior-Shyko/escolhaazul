<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\ProposalCreateRequest;
use App\Http\Requests\UpdateProposalRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProposalController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Proposal/Proposal');
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
    public function store(StoreProposalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProposalRequest $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $proposal)
    {
        //
    }

    public function createUser(ProposalCreateRequest $request)
    {
       try {
        $user = new UserService($request->name, $request->email);
        $user->createUser();
       } catch (\Exception $th) {
         dump($th->getMessage());
       }
    }
}
