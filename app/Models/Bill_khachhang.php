<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_khachhang extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_money',
        'customer_id'
    ];

    // public function cthd() {
    //     return $this->hasMany(CTHD::class, 'id' , 'id');
    // }
}
