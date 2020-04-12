<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable  = [
        'path',
        'post_id',
    ];


    public function post(){
        return $this->belongsTo(Post::class);
    }
}
