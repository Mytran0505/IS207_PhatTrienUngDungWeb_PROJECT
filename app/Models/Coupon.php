<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'number',
        'menu_id',
        'product_id',
        'active',
        'start_date',
        'end_date',
        'status'
    ];

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
