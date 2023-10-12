<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService {
    
    public function __construct(
        public string $name = '', 
        public string $email = ''
    ) { }

    public function createUser() {
       
        $pass = rand(8, 20);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($pass),
        ]);

        dump($user);
        // event(new Registered($user));
    }
}