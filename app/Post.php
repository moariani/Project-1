<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Fillable Fieilds
    protected $fillable = [
        'title' , 'body' , 'category' , 'user_id'
    ] ;
    // Relation With Comment Model
    public function comments() {
        return $this->hasmany('App\Comment') ;
    }
    // Relation With User Model
    public function user() {
        return $this->belongsTo('App\User') ;
    }
}
