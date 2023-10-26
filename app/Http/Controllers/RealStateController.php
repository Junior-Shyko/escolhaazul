<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRealStateRequest;
use App\Http\Requests\UpdateRealStateRequest;
use App\Models\RealState;

class RealStateController extends Controller
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
    public function store(StoreRealStateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RealState $realState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RealState $realState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRealStateRequest $request, RealState $realState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RealState $realState)
    {
        //
    }

    public function createOrUpdate(UpdateRealStateRequest $request)
    {
        //Verifica se tem os dados
        $realState = RealState::where(
            ['object_id' => $request->proposal_id, 'object_type' => 'personal']
        )->first();
        //Se nao tiver registro então cria um registro
        if( is_null($realState) )
        {
            try {
                $request['object_id'] = $request->proposal_id;
                unset($request->proposal_id);
                RealState::create($request->all());
                return response()->json(['message' => 'success'], 200);
            } catch (\Throwable $th) {
                throw $th;
            }
            
        }else{
            //Se já tiver um registro, então atualiza
            try {
                $request['object_id'] = $request->proposal_id;
                unset($request['proposal_id']);
                $realState->update($request->all());
                return response()->json(['message' => 'Atualizado'], 200);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
