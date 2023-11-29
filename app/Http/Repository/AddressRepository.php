<?php

namespace App\Http\Repository;

use App\Models\Address;

class AddressRepository {

    /**
     * Funcao que retorna os dados do endereço, passando o usuario, object_id e object_type
     *
     * @param [integer] $user
     * @param [integer] $object_id
     * @param [string] $object_type
     * @return Address
     */
    function getData($user, $object_id, $object_type): Address
    {
        return Address::where(['user_id' => $user, 'object_id' => $object_id, 'object_type' => $object_type])->first();
    }
}