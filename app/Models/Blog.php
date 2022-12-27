<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'name',
        'status',
        'image',
        'content'
    ];
    
    public function scopeNewBlog($query, $limit = 4){
        $query = $query 
            -> where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->limit($limit);

        return $query;
    }

     // check orrder_detail
     public function comments(){
        return $this->hasMany(Comment::class,'blog_id','id')->orderBy('id', 'DESC');
    }
    

}
