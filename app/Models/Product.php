<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'menu_id',
        'original_price',
        'price_sale',
        'active',
        'image'
    ];

    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
