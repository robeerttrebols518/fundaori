<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'description', 'user_id'
    ];
    // relacion de 1 a muchos
    // muchos post para un usuario
    public function user(){
        return $this->belongsTo('App\User');
    }
}
