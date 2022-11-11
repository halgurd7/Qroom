<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\Contracts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'address',
        'contact_1',
        'contact_2',
        'free_trail',
        'start_date',
        'note',
        'password'
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
    ];

    //Relationship With Contracts
    public function costumer_contract(){
        return $this->hasOne(Costumer_Contract::class,'user_id');
    }

    //Relationship With Contracts
    public function costumer_invoice(){
        return $this->hasMany(Costumer_Invoice::class,'user_id');
    }
}