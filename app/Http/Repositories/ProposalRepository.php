<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProposalRepository {

    public function getData($component, $proposal, $user)
    {
        //Se nao tiver id de proposta
        if($proposal == 0)
        {
            $data = DB::table($component)->where(['user_id' => $user]);
            return $data;
        }
        $data = DB::table($component)->where(['id' => $proposal, 'user_id' => $user]);
       return $data;
    }
}