<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProposalRepository;
use Inertia\Inertia;

use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Services\PhoneService;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\ProposalCreateRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Models\DataPersonal;
use App\Models\RentalData;


class ProposalController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->all();
        // if(count($user) == 0)
        //     return redirect('/');

        return Inertia::render('Proposal/Proposal', ['user' => $user]);
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
        //Criando um usuário
        $userService = new UserService($request->name, $request->email);
        $user = $userService->createUser();
        $createPhone = false;
        //Usuário criado
        if($user) {
            //Cadastrando telefone
            $phone = new PhoneService($request->phone, $user->id , 'User', $user->id);
            $createPhone = $phone->createPhone();
            $rentalDataId = RentalData::insertGetId(
                ['typeRentalUser' => $request->type, 'user_id' => $user->id]
            );
            DataPersonal::insert(['user_id' => $user->id]);
            if($createPhone)
                $user->proposal_id = $rentalDataId;
                return response()->json(['user' => $user], 200);
        }
        
        return response()->json(['message' => 'Phone not cadastre'], 200);

       } catch (\Exception $th) {
         dump($th->getMessage());
       }
    }

    public function terms(Request $request)
    {

        $user = $request->data['user'];
        // $user = [];
       
        return Inertia::render('Proposal/Terms', ['user' => $user]);
    }


    public function getData($component, $proposal, $user)
    {
        $getData = new ProposalRepository;
        return $getData->getData($component, $proposal, $user)->first();
        
    }
}
