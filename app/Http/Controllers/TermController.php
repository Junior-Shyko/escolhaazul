<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TermController extends Controller
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
        if($request->ajax())
        {
            $dataTerms = [
                'user_id' => $request->id,
                'rental_data_id'=> $request->proposal_id,
                'date_check' => Carbon::now()
            ];

            try {
                Term::create($dataTerms);
                return response()->json(['user' => $request->all()]);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Term $term)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Term $term)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term)
    {
        //
    }
}
