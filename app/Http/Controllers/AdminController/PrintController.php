<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Product;
use App\Models\Status;
use DB;
use App\Models\Setting;


class PrintController extends Controller
{
	private $order;
	private $product;
	private $productOrder;
	private $status;
	private $setting;
	public function __construct(Order $order, Product $product, ProductOrder $productOrder, Status $status, Setting $setting){
		$this -> order = $order;
		$this -> product = $product;
		$this -> productOrder = $productOrder;
		$this -> status = $status;
		$this -> setting = $setting;
	}

	public function getPrint($id){
		$findorder = $this -> order -> findOrfail($id);
		$totalprice = DB::table('orders')
		-> join('product_orders', 'orders.id', '=', 'product_orders.order_id')
		-> join('products', 'product_orders.product_id', '=', 'products.id')
		->where('orders.id',$id)
		-> select('orders.id as order_id', 'product_orders.price as price','product_orders.quantity as quantity', 'products.feature_image_path as feature_image_path', 'products.id as id', 'products.name as name','product_orders.price_sale as price_sale')
		-> get();
		$status = $this -> status -> all();
		$nameshop = $this -> setting -> where('config_key','nameshop')->value('config_value');
		$phone_number = $this -> setting -> where('config_key','phone_number')->value('config_value');
		$address = $this -> setting -> where('config_key','address')->value('config_value');
		$email = $this -> setting -> where('config_key','email')->value('config_value');
		$feeship = $this -> setting -> where('config_key','feeship')->value('config_value');
		$logo = $this -> setting -> where('config_key','logo')->value('config_value');
		return view('admin.print.print_order',compact('findorder','totalprice','status','feeship','address','phone_number','email','logo'));
	}
}
