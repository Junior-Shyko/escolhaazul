<?php

namespace App\Http\Controllers;

use App\app\Http\Service\ImmobileService;
use App\Models\Immobile;
use Illuminate\Http\Request;
use function simplexml_load_file;

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
        $filePath = 'https://assets.praedium.com.br/76636bSsOil7GfOk5qz/imovelweb/iw_ofertas.xml';
        $xml = new ImmobileService($filePath);
        $success = $xml->readXmlAndSaveToDatabase();
        dump($success);
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
}
