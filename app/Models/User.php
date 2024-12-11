<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserStatusEnum;
use App\Notifications\ResetPasswordNotification;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Spatie\Permission\Traits\HasRoles;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable implements HasName, FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        "gender",
        'address',
        'code',
        'phone', 
        'image',
        'status',
        'zip',
        'name',
        'city_id',
        'password',
    ];

    public function sendPasswordResetNotification($token)
    {
        try {
            $this->notify(new ResetPasswordNotification($token));
        } catch (\Throwable $th) {
            //throw $th;
        }
       
    }

    public function getFilamentName(): string
    {
        if($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";
        }elseif($this->name){
            return $this->name;
        }else{
            return $this->email;
        }
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return (!$this->hasRole('client'));
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }


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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatusEnum::class
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['full_name', 'email']);
    }


    public function discounts(){
        return $this->hasMany(Discount::class);
    }
}
