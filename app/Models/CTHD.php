<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHD extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'amount',
        'unit_price'
    ];

    public function product() {
        return $this->hasOne(Product::class, 'id','product_id');
    }
}
