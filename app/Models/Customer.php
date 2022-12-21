<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'content',
        'spend'
    ];

    public function orders() {
        return $this->hasOne(Bill_khachhang::class, 'customer_id', 'id');
    }

    public function cthd() {
        return $this->hasManyThrough(CTHD::class, Bill_khachhang::class, 'customer_id', 'id', 'id', 'id');
    }
}
