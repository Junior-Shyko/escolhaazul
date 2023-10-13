<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Support\Facades\Hash;


class PhoneService {
    
    public function __construct(
        public string $number = '',
        public string $objectId = '',
        public string $objectType = '',
        public string $userId = '',
    ) { }

    public function createPhone() {
        $phone = Phone::insert([
            'number' => $this->number,
            'object_id' => $this->objectId,
            'object_type' => $this->objectType,
            'user_id' => $this->userId
        ]);
        
        return $phone;
        // event(new Registered($user));
    }
}