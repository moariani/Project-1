<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Fillable Fieilds
    protected $fillable = [
        'email' , 'body' , 'post_id'
    ] ;
    // Relation With Post Model
    public function post() {
        return $this->belongsTo('App\Post') ;
    }

}
