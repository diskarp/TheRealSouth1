<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // Añadimos user_id aquí
        'body',
    ];


    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function author() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
