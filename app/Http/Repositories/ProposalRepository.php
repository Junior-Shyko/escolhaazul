<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProposalRepository {

    public function getData($component, $proposal, $user, $objectType = null)
    {
        //Se nao tiver id de proposta
        if($proposal == 0)
        {
            $data = DB::table($component)->where(['user_id' => $user]);
            return $data;
        }

        if($objectType)
        {
            $data = DB::table($component)->where([
                'object_id' => $proposal, 'object_type' => $objectType
            ]);
            return $data;
        }
        $data = DB::table($component)->where(['id' => $proposal, 'user_id' => $user]);
       return $data;
    }
}