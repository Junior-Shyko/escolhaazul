<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\User;
use App\Models\RentalData;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Repository\Helpers;
use App\Http\Requests\StoreRentalDataRequest;
use App\Http\Requests\UpdateRentalDataRequest;
use Carbon\Carbon;

class RentalDataController extends Controller
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
        dump(request());
        $proposta = RentalData::find(181);
        $term = Term::where('rental_data_id', $proposta->id)->delete();
        // $proposta->terms()->delete();
        $proposta->delete();
        dump($proposta->terms());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentalDataRequest $request)
    {
        dump($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(RentalData $rentalData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentalData $rentalData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentalDataRequest $request)
    {

        try {
            $idRental = $request->proposal_id;
            unset($request['proposal_id']);//Excluindo para não entrar no update

            $rental = new RentalData;
            $rental->where('id', $idRental)->update($request->all());
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentalData $rentalData)
    {
        dd($rentalData);
        // $proposta = RentalData::find(181);
        // $term = Term::where('rental_data_id', $proposta->id)->delete();
        // // $proposta->terms()->delete();
        // $proposta->delete();
    }

    public function analysis($id, $proposalId)
    {
        //Usuário da proposta
        $user = User::find($id);
//        dump($user);
        $proposal = RentalData::find($proposalId);
        // dd($proposal->bank()->first());
        $titulo_page_pdf = 'Análise de proposta - '.$proposal->typeRentalUser;
        // return view('proposal.analysis', compact('user', 'titulo_page_pdf', 'proposal'));
        $professionals = $proposal->professional()->get();
        $phones = $user->phone()->get();
//        dump();

        $realstate = $proposal->realState()->get();
        $commercials = $proposal->commercial()->get();
        $personals = $proposal->referencePersonal()->get();
        $banks = $proposal->bank()->get();
        $properties = $proposal->properties()->get();
        $vehicles = $proposal->vehicle()->get();
        $carbon = new Carbon();

        $pdf = Pdf::loadView('proposal.analysis', compact('user',
            'titulo_page_pdf','proposal', 'phones', 'properties',
            'realstate', 'professionals', 'personals', 'banks', 'vehicles',
            'commercials', 'carbon'));
        return $pdf->stream('invoice.pdf');
        // dd($rentalData->id);
        // $user = User::find(119);
        // dump($user->dataPersonal()->get());
        // dump($user->propoertie()->get());
        // dump($user->realState()->get());
        // dump($user->referencePersonal()->get());
    }
}
