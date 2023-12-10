<?php

namespace App\Http\Repository;

use App\Models\Address;

use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\DeleteAction;

class CustomAction extends DeleteAction
{
    public $role;

    

    public static function getUrlToRole($roles)
    {
        foreach ($roles as $key => $role) {            
            if($role == 'common')
            {
                return redirect('logout');
            }
        }
        
    }
}