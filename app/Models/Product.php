<?php

namespace App\Models;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Product extends Model
{
	use SoftDeletes;
    protected $guarded =[];
    public function category(){
    	return $this->belongsTo(Category::class,'category_id');
    }
    public function brand(){
        return $this -> belongsTo(Brand::class,'brand_id');
    }
    public function productImage(){
    	return $this->hasMany(ProductImage::class,'product_id');
    }
    public function tags(){
    	return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id') -> withTimeStamps();
    }

    public function order(){
        return $this ->belongsToMany(Order::class,'product_orders','product_id','order_id');
    }
}
