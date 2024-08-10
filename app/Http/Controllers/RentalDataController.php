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
use Illuminate\Http\JsonResponse;
use function array_push;
use function dd;
use function dump;
use function gettype;
use function simplexml_load_file;

class RentalDataController extends Controller
{
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

        $real = $proposal->real()->get();
        $commercials = $proposal->commercial()->get();
        $personals = $proposal->referencePersonal()->get();
        $banks = $proposal->bank()->get();
        $properties = $proposal->properties()->get();
        $vehicles = $proposal->vehicle()->get();
        $carbon = new Carbon();
        $realstate = $proposal->realState()->get();

        $pdf = Pdf::loadView('proposal.analysis', compact('user',
            'titulo_page_pdf','proposal', 'phones', 'properties',
            'real', 'professionals', 'personals', 'banks', 'vehicles',
            'commercials', 'carbon', 'realstate'));
        return $pdf->stream('invoice.pdf');
        // dd($rentalData->id);
        // $user = User::find(119);
        // dump($user->dataPersonal()->get());
        // dump($user->propoertie()->get());
        // dump($user->real()->get());
        // dump($user->referencePersonal()->get());
    }

    public function immobileAll()
    {
        $xml = simplexml_load_file('https://assets.praedium.com.br/76636bSsOil7GfOk5qz/imovelweb/iw_ofertas.xml');
        dump($xml->Imoveis);
        $immobiles = [];
        foreach ($xml->Imoveis->Imovel as $key => $imovel) {
//
//            dump($imovel->TituloImovel);
            $immobiles['immobile'] = (string) $imovel->TituloImovel;;
//            $immobiles['type'] = $imovel->TipoImovel;
//            dump(gettype($imovel->TituloImovel));


        }
        dump($immobiles);
//        return response()->json($immobiles);
    }
}
