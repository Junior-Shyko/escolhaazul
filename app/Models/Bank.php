<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_bank',
        'name_agency',
        'number_acoount',
        'name_manager',
        'phone_manager',
        'email_manager',
        'client_since',
        'credit_approved',
        'name_credit_card1',
        'name_credit_card2',
        'limit_credit_card1',
        'limit_credit_card2',
        'name_bank_application1',
        'name_agency_application1',
        'name_account_application1',
        'value_application1',
        'name_bank_application2',
        'name_agency_application2',
        'name_account_application2',
        'value_application2',
        'object_id',
        'object_type'
    ];
}
