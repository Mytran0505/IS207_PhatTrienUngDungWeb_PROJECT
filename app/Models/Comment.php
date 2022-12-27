<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $fillable = [
        'customer_id',
        'blog_id',
        'reply_id',
        'content'
    ];

     

    public function cus(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    // check orrder_detail
    public function replies(){
        return $this->hasMany(Comment::class,'reply_id','id');
    }
}