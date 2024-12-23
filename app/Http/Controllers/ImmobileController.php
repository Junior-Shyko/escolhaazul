<?php

namespace App\Http\Controllers;

use App\Http\Repository\ImmobileRepository;
use App\Http\Services\ImmobileService;
use App\Models\Immobile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImmobileController extends Controller
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

        $xml = ImmobileService::retornoDoMetodo();
//        $success = $xml->readXmlAndSaveToDatabase();
        dump($xml);
    }

    /**
     * Display the specified resource.
     */
    public function show(Immobile $immobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Immobile $immobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Immobile $immobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Immobile $immobile)
    {
        //
    }

    public function sync()
    {
        ImmobileService::readXmlAndSaveToDatabase();
    }

    public function allImmobile(): JsonResponse
    {
        $allImmobile = ImmobileRepository::all();
        return response()->json($allImmobile);
    }
}
