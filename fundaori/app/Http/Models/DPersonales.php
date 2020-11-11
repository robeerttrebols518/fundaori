<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // se agrego esta fila

class DPersonales extends Model
{
    use SoftDeletes; 
    protected $dates = ['deleted_at'];
    protected $table = 'datos_personales';
    protected $hidden = ['created_at', 'updated_at'];

    //public function cat(){
        // hasOne -> relación de uno a uno
        //return $this->hasOne(Category::class, 'id', 'category_id');
    //}

    //public function getGallery(){
        // hasMany -> relación de uno a Muchos
        //return $this->hasMany(PGallery::class, 'product_id', 'id'); 
    //}
}
