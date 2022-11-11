<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer_Contract extends Model
{
    public $table = 'costumer_contract';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'valid_from',
        'valid_to',
        'prepayment',
        'monthly_payment',
        'user_quantity',
        'note'
    ];

    //Relationship to User
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}