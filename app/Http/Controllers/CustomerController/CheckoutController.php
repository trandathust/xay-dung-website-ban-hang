<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest\CheckOutRequest;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use DB;
use Carbon;
use App\Models\Setting;

class CheckoutController extends Controller
{
	private $product;
	private $order;
	private $user; 
	private $productOrder;
	private $setting;

	public function __construct(Product $product, Order $order, User $user, ProductOrder $productOrder, Customer $customer, Setting $setting){
		$this -> product = $product;
		$this -> order = $order;
		$this -> user = $user;
		$this -> productOrder = $productOrder;
		$this -> customer = $customer;
		$this -> setting = $setting;
	}
	public function getCheckout(){
		$timenow = Carbon\Carbon::now()->toDateTimeString();
		$product = $this -> product -> first();
		$feeship = $this -> setting -> where('config_key','feeship')->value('config_value');
		return view('customer.pages.checkout', compact('product','timenow','feeship'));
	}
	public function postCheckout(CheckOutRequest $request){
    	//nếu người dùng đã có tài khoản
    	//lưu thông tin giỏ hàng + tài khoản người dùng vào bảng orders
		$timenow = Carbon\Carbon::now()->toDateTimeString();
		$feeship = $this -> setting -> where('config_key','feeship')->value('config_value');

		$cart = session() -> get('cart');
		if($cart){
			if(auth()->check()){
				try {
					DB::beginTransaction();
					$total_money = $feeship;
					foreach (session('cart') as $id => $value) {
						if($timenow > $value['end_sale']){
							$total_money = $total_money + $value['price']*$value['quantity'];
						}
						else{
							$total_money = $total_money + $value['price_sale']*$value['quantity'];
						}
						
					}
    			//thêm vào bảng orders
					$order = $this -> order -> create([
						'user_id' => Auth::id(),
						'customer_id' =>null,
						'status_id' => '1',
						'message' => $request -> message,
						'total_money' => $total_money,
					]);
    			//thêm vào bảng product_orders
					foreach (session('cart') as $id => $value) {
						if($timenow > $value['end_sale']){
							$this -> productOrder -> create([
							'order_id' => $order -> id,
							'product_id' => $value['id'],
							'price' => $value['price'],
							'price_sale' => null,
							'quantity' => $value['quantity'],
						]);
						}
						else{
							$this -> productOrder -> create([
							'order_id' => $order -> id,
							'product_id' => $value['id'],
							'price' => $value['price'],
							'price_sale' => $value['price_sale'],
							'quantity' => $value['quantity'],
						]);
						}
						
					}
					DB::commit();
					session()->forget('cart');
					return response() -> json([
						'code' => 200,
						'message' => 'success'
					], 200);

				} catch (Exception $e) {
					DB::rollBack();
					return response() -> json([
						'code' => 500,
						'message' => 'fail'
					], 500);
				}
			}
			else{
				try {
					DB::beginTransaction();
					$total_money = $feeship;
					foreach (session('cart') as $id => $value) {
						if($timenow > $value['end_sale']){
							$total_money = $total_money + $value['price']*$value['quantity'];
						}
						else{
							$total_money = $total_money + $value['price_sale']*$value['quantity'];
						}
						
					}
				//thêm vào bảng customers
					$customers = $this -> customer -> create([
						'name' => $request -> name,
						'phone_number' => $request -> phone_number,
						'address' => $request -> address,

					]);
    			//thêm vào bảng orders
					$order = $this -> order -> create([
						'user_id' =>null,
						'customer_id' => $customers -> id,
						'status_id' => '1',
						'message' => $request -> message,
						'total_money' => $total_money,
					]);
    			//thêm vào bảng product_orders
					foreach (session('cart') as $id => $value) {
						if($timenow > $value['end_sale']){
							$this -> productOrder -> create([
							'order_id' => $order -> id,
							'product_id' => $value['id'],
							'price' => $value['price'],
							'price_sale' => null,
							'quantity' => $value['quantity'],
						]);
						}
						else{
							$this -> productOrder -> create([
							'order_id' => $order -> id,
							'product_id' => $value['id'],
							'price' => $value['price'],
							'price_sale' => $value['price_sale'],
							'quantity' => $value['quantity'],
						]);
						}
					}
					DB::commit();
					session()->forget('cart');
					return response() -> json([
						'code' => 200,
						'message' => 'success'
					], 200);

				} catch (Exception $e) {
					DB::rollBack();
					return response() -> json([
						'code' => 500,
						'message' => 'fail'
					], 500);
				}

			}
		}
		else
			return abort(404);
	}
}
