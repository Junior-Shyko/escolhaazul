<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;

class BankController extends Controller
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
    public function store(StoreBankRequest $request)
    {
        dump($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }

    public function createOrUpdate(UpdateBankRequest $request)
    {
        //Verifica se tem os dados
        $bank = Bank::where(
            ['object_id' => $request->proposal_id, 'object_type' => 'personal']
        )->first();
        //Se nao tiver registro então cria um registro
        if( is_null($bank) )
        {
            try {
                $request['object_id'] = $request->proposal_id;
                unset($request->proposal_id);
                Bank::create($request->all());
                return response()->json(['message' => 'success'], 200);
            } catch (\Throwable $th) {
                throw $th;
            }
            
        }else{
            //Se já tiver um registro, então atualiza
            try {
                $request['object_id'] = $request->proposal_id;
                unset($request['proposal_id']);
                $bank->update($request->all());
                return response()->json(['message' => 'Atualizado'], 200);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}
