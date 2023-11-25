<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Personal;
use App\Models\Property;
use App\Models\DataPersonal;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        // return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        return $this->hasPermissionTo('access_admin');
    }

    public function dataPersonal(): HasMany
    {
        return $this->hasMany(DataPersonal::class);
    }

    public function propoertie(): HasMany
    {
        return $this->hasMany(Property::class, 'object_id');
    }

    public function realState(): HasMany
    {
        return $this->hasMany(RealState::class, 'object_id');
    }

    //Relação com referencia pessoal
    public function referencePersonal(): HasMany
    {
        return $this->hasMany(Personal::class, 'object_id');
    }

    //Relação com os arquivos de usuário
    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'object_id');
    }
  
    // Relação com referencia comercial
    public function commercial(): HasMany
    {
        return $this->hasMany(Commercial::class, 'object_id');
    }
    
    //Relação com referencia bancaria
    public function bank(): HasMany
    {
        return $this->hasMany(Bank::class, 'object_id');
    }
        
    //Relação com referencia bancaria
    public function address(): HasMany
    {
        return $this->hasMany(Address::class, 'object_id');
    }

}
