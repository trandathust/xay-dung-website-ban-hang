<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use SoftDeletes;
    protected $guarded =[];
    public function user(){
    	return $this -> belongsTo(User::class,'user_id');
    }
}
