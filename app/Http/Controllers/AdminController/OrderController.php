<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Product;
use App\Models\Status;
use DB;

class OrderController extends Controller
{
	private $order;
	private $product;
	private $productOrder;
	private $status;

	public function __construct(Order $order, Product $product, ProductOrder $productOrder, Status $status){
		$this -> order = $order;
		$this -> product = $product;
		$this -> productOrder = $productOrder;
		$this -> status = $status;
	}
    public function getOrder(){
      
    	$listOrder = $this -> order -> all();
    	$totalPrice = DB::table('orders')
      -> join('product_orders', 'orders.id', '=', 'product_orders.order_id')
      -> join('products', 'product_orders.product_id', '=', 'products.id')
      -> select('orders.id as order_id', 'product_orders.price as price','product_orders.quantity as quantity','product_orders.price_sale as price_sale')
      -> get();
      $status = $this -> status -> all();
      return view('admin.order.view', compact('listOrder','totalPrice', 'status'));
  }
  
  public function getDetailOrder($id){
   $findorder = $this -> order -> findOrfail($id);
   $totalprice = DB::table('orders')
   -> join('product_orders', 'orders.id', '=', 'product_orders.order_id')
   -> join('products', 'product_orders.product_id', '=', 'products.id')
   ->where('orders.id',$id)
   -> select('orders.id as order_id', 'product_orders.price as price','product_orders.quantity as quantity', 'products.feature_image_path as feature_image_path', 'products.id as id', 'products.name as name','product_orders.price_sale as price_sale')
   -> get();
   $status = $this -> status -> all();
   return view('admin.order.detail',compact('findorder','totalprice','status'));
}


public function updateOrder($id, Request $request){

    $this -> order -> findOrfail($id)-> update([

        'status_id' => $request -> select,
    ]);

    return response() -> json([
            'code' => 200,
            'message' => 'success'
        ], 200);
}


public function deleteOrder($id){
    $this -> order -> findOrfail($id) -> delete();
    return response() -> json([
            'code' => 200,
            'message' => 'success'
        ], 200);
}
}
