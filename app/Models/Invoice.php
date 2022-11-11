<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $table = 'invoice';
    use HasFactory;
    protected $fillable = [
        'item_name',
        'price',
        'quantity',
        'subtotal',
        'note'
    ];

    public function scopeFilter($query,array $filters){

        // This Function Make the Search Find the Content
        if($filters['search'] ?? false){
            $query->where('item_name','like','%'.request('search').'%')
            ->orWhere('note','like','%'.request('search').'%')
            ->orWhere('price','like','%'.request('search').'%');
        }
    }
}