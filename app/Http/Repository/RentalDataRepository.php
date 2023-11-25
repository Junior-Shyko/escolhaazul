<?php

namespace App\Http\Repository;

use App\Models\User;
use App\Models\RentalData;

class RentalDataRepository {

    static public function getDataReport(RentalData $rental)
    {
        dump($rental->user_id);
        $user = User::find($rental->user_id);
        dump($user->dataPersonal()->get());
        dump($user->propoertie()->get());
        dump($user->realState()->get());
        dump($user->referencePersonal()->get());
        dump($user->files()->where('object_type', 'personal')->get());
        dump($user->commercial()->where('object_type', 'personal')->get());
        dump($user->bank()->where('object_type', 'personal')->get());
        dump($user->address()->where('object_type', 'address_personal')->get());
    }
}