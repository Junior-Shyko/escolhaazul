<?php

namespace App\Http\Repositories;

use App\Models\Address;

class AddressRepository {

    function getData($user, $object, $type){
        return Address::where(['user_id' => $user, 'object_id' => $object, 'object_type' => $type])->first();
    }
}