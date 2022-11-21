<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHD extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'amount'
    ];
}
