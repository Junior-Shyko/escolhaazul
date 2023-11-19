<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use Inertia\Inertia;
use App\Models\Proposal;
use App\Models\RentalData;
use App\Mail\FinishProposal;
use App\Models\DataPersonal;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use App\Http\Services\PhoneService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreProposalRequest;
use App\Http\Requests\ProposalCreateRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Http\Repositories\ProposalRepository;

class ProposalController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->all();
        if(count($user) == 0)
            $user = Auth::user();

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
    public function show()
    {
        
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
        //Criando um usuário
        
        // dump($request->phone);
        $userService = new UserService($request->name, $request->email, $request->phone);
        $user = $userService->createUser();
        // dump($user->password);
        $createPhone = false;
        $passName = substr($request->name, 0, 4);
        $passPhone = substr($request->phone, -4);
        // dump($passName);
        // dump($passPhone);
        $password = $passName.$passPhone;

        if (Auth::attempt(['email' => $request->email, 'password' => $password])) {
            $request->session()->regenerate();
        }

        try {

            //Usuário criado
            if ($user) {
                //Cadastrando telefone
                $phone = new PhoneService($request->phone, $user->id, 'User', $user->id);
                $createPhone = $phone->createPhone();
                $rentalDataId = RentalData::insertGetId(
                    ['typeRentalUser' => $request->type, 'user_id' => $user->id, 'object_id' => $user->id, 'object_type' => 'personal']
                );
                DataPersonal::insert(['user_id' => $user->id]);
                if ($createPhone)
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
        return Inertia::render('Proposal/Terms', ['user' => $user]);
    }


    public function getData($component, $proposal, $user, $objectType)
    {
        $getData = new ProposalRepository;
        return $getData->getData($component, $proposal, $user, $objectType)->first();
    }

    public function finishProposal($email)
    {
        return Inertia::render('Proposal/Finish', ['email' => $email]);
    }

    public function alterStatus(Request $request)
    {

        $proposal = RentalData::find($request->proposal);
        $user = User::find($request->user_id);

        try {
            $proposal->update([
                'status' => $request->status,
                'date_finish' => Carbon::now()
            ]);
            $mail = Mail::to('contato@escolhaazul.com')
                ->send(new FinishProposal([
                    'fromEmail' => $user->email,
                    'fromName' => $user->name,
                    'subject' => 'Proposta enviada com sucesso'
                ]));

            if ($mail)
                return redirect('finalizar/fran@mail.com');
        } catch (\Throwable $th) {
            throw $th;
        }

        // return redirect('finalizar/fran@mail.com');
    }

    public function sendGuarantor(Request $request)
    {
        
    }
}
