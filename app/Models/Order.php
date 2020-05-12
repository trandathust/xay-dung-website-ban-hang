<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;

class Order extends Model
{
    use SoftDeletes;
    protected $guarded =[];
    public function product(){
    	return $this -> belongsToMany(Product::class,'product_orders','order_id','product_id');
    }
    public function user(){
    	return  $this -> belongsTo(User::class);
    }
    public function customer(){
    	return $this -> belongsTo(Customer::class);
    }
    public function status(){
        return $this -> belongsTo(Status::class,'status_id');
    }
}
