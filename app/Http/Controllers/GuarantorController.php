<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guarantor;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\ProposalService;
use App\Mail\Guarantor as GuarantorMail;
use App\Http\Requests\StoreGuarantorRequest;
use App\Http\Requests\UpdateGuarantorRequest;

class GuarantorController extends Controller
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
    public function store(StoreGuarantorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($user, $object, $type)
    {
       $gua = Guarantor::where([
        'user_id' => $user, 'object_id' => $object, 'object_type' => $type
       ])->orderBy('id', 'desc')->get();
       return response()->json($gua);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guarantor $guarantor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuarantorRequest $request, Guarantor $guarantor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guarantor $guarantor)
    {
        //
    }

    public function createOrUpdate(UpdateGuarantorRequest $request)
    {
        $guarantor['name'] = $request->name;
        $guarantor['email'] = $request->email;
        $guarantor['object_type'] = $request->object_type;
        $guarantor['object_id'] = $request->proposal_id;
        $guarantor['user_id'] = $request->user_id;
        try {
            Guarantor::create($guarantor);
            $user = User::find($request->user_id);
            $mail = Mail::to('contato@escolhaazul.com')
                ->send(new GuarantorMail([
                    'fromEmail' => $request->email,
                    'fromName' => $request->name,
                    'subject' => 'SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO',
                    'user' => $user
                ]));
               
            if ($mail)
                return response()->json(['message' => 'Convite enviado para o fiador'], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Faz uma verificação se o email foi solicitado como fiador
     *
     * @return void
     */
    public function verifyRequestGuarantor($email)
    {
        $guarantor = Guarantor::where('email', $email)->first();
        //Existe o email do fiador e já aceitou ser fiador
        if(!is_null($guarantor) && $guarantor->accept == 1) {
            return response()->json(['accept' => 1, 'verify' => true]);
        //Existe o email do fiador e não aceitou ser fiador
        }elseif(!is_null($guarantor) && $guarantor->accept == 0) {
            return response()->json(['accept' => 0, 'verify' => true]);
        }
        //Nao existe solicitação do email para fiador
        elseif(is_null($guarantor))
        {
            return response()->json(false);
        }

    }
}
