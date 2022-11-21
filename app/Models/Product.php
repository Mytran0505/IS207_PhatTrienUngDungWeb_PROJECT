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
        'price',
        'price_sale',
        'active',
        'views',
        'image'
    ];

    protected $primaryKey = 'product_id';
    protected $table = 'product';

    public function menu(){
        return $this->hasOne(Menu::class, 'product_id', 'menu_id');
    }
}
