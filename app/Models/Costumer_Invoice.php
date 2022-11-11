<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer_Invoice extends Model
{
    public $table = 'costumer_invoice';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'invoice_date',
        'done'
    ];

    //Relationship to User
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}