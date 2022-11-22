<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_vanglai extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_date',
        'total_money',
        'customer_phone_number'
    ];
}
