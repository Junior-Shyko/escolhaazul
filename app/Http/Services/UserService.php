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

    /**
     * Cria um usuário novo se o email não existir no banco de dados
     *
     * @return User
     */
    public function createUser() : User
    { 
        $user = User::where('email', $this->email)->first();

        if(is_null($user))
        {
            $passName = substr($this->name, 0, 4);
            $passPhone = substr($this->phone, -4);
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($passName.$passPhone),
            ]);
            
            //adicionando permissao ao usuário
            $user->givePermissionTo('access_admin');
            $user->assignRole('common');
            return $user;
        }
       
        return $user;
        // event(new Registered($user));
    }
}