<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon;

class ShoppingController extends Controller
{
	private $product;
	public function __construct(Product $product){
		$this -> product = $product;
	}
    public function getShopping(){
    	$listProduct = $this -> product -> where('status','=',1)-> simplePaginate(9);
    	return view('customer.pages.shopping',compact('listProduct'));
    }
    public function getSale(){
    	$mytime = Carbon\Carbon::now()->toDateTimeString();
    	$listProductSale = $this -> product -> whereDate('end_sale', '>', $mytime)-> where('status','=',1)->whereNotNull('price_sale')-> simplePaginate(9);
    	return view('customer.pages.product_sale',compact('listProductSale','mytime'));
    }
    public function getNew(){
        $mytime = Carbon\Carbon::now()->toDateTimeString();
    	$listProductLastest = $this -> product -> latest() -> where('status','=',1)-> simplePaginate(9);
    	return view('customer.pages.product_new',compact('listProductLastest','mytime'));
    }
}
