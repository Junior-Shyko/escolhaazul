<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService {
    
    public function __construct(
        public string $name = '', 
        public string $email = '',
        public string $phone = ''
    ) { }

    public function createUser() : User
    { 
        // dump($this->phone);
        $passName = substr($this->name, 0, 4);
        $passPhone = substr($this->phone, -4);
        // dump($passName);
        // dump($passPhone);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($passName.$passPhone),
        ]);

        return $user;
        // event(new Registered($user));
    }
}