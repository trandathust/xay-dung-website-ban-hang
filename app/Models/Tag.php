<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded =[];
    public function product(){
    	return $this->belongsToMany(Product::class,'product_tags','tag_id','product_id') -> withTimeStamps();
    }
}
