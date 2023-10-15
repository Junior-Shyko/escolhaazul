<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProposalRepository {

    public function getData($component, $proposal, $user)
    {
       $data = DB::table($component)->where(['id' => $proposal, 'user_id' => $user]);
       return $data;
    }
}