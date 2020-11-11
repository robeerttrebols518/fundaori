<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DUser extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'demos_user';
    protected $hidden = ['created_at', 'updated_at'];

    public function getDemo(){
        // hasMany -> relación de uno a Muchos
        return $this->hasMany(Demo::class, 'demo_id', 'id'); 
    }
}
