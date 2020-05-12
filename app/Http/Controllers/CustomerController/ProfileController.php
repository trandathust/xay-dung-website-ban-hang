<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CustomerRequest\UserRequest;
use App\Http\Requests\CustomerRequest\PasswordRequest;
use DB;
use App\Traits\StorageImageTrait;
use Hash;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Product;
use App\Models\Status;

class ProfileController extends Controller
{
	use StorageImageTrait;
	private $user;
	private $order;
	private $product;
	public function __construct(User $user, Product $product, Order $order){
		$this -> product = $product;
		$this -> user = $user;
		$this -> order = $order;
	}
	public function getViewProfile(){
		$id = auth()-> user() -> id;
		$user = $this -> user -> findOrfail($id);
		return view('customer.profile.view',compact('user'));
	}
	public function postViewProfile(UserRequest $request){
		$id = auth()-> user() -> id;
		$password = auth() -> user()-> password;
		try {
			DB::beginTransaction();
			$userUpdate = [
				'name'=> $request -> name,
				'email' => $request -> email,
				'password' => $password,
				'address' => $request -> address,
				'phone_number' => $request -> phone_number,
				'birthday' => $request -> birthday,
				'sex' => $request -> sex,
			];
			$userUploadAvatar = $this -> storageTraitUpload($request,'avatar','avatar');
			if (!empty($userUploadAvatar)){
				$userUpdate['avatar_name'] = $userUploadAvatar['file_name'];
				$userUpdate['avatar_path'] = $userUploadAvatar['file_path'];
			}
			$this -> user -> findOrfail($id) ->update($userUpdate);
			DB::commit();
			return back()->with('thanhcong','Cập nhật thành công!');
		} catch (Exception $exception) {
			DB::rollBack();
			return back()->with('thongbao','Cập nhật thất bại! Không thay đổi thông tin của người dùng');
		}

	}

	public function getChangePassword(){
		$id = auth()-> user() -> id;
		$user = $this -> user -> findOrfail($id);
		return view('customer.profile.change_password',compact('user'));
	}

	public function postChangePassword(PasswordRequest $request){
		$current_password = auth() -> user()-> password;
		$id = auth() -> user()-> id;           
		if(Hash::check($request -> current_password, $current_password))
		{                               
			$this -> user -> findOrfail($id) -> update([
				'password' => Hash::make($request -> password)
			]);
			return back() -> with('thanhcong','Cập nhật mật khẩu thành công!');
		}
		else
		{           
			return back() -> with('thatbai','Bạn nhập sai mật khẩu!');   
		}
	}


	public function getOrder(){
		$id = auth()-> user() -> id;
		$user = $this -> user -> findOrfail($id);
		$listOrderDetail = DB::table('orders')
					-> where('orders.user_id','=',$id)
					-> join('product_orders','orders.id','=','product_orders.order_id')
					-> join('products','product_orders.product_id','=','products.id')
					-> join('statuses','orders.status_id','=','statuses.id')
					-> select('products.feature_image_path as image','products.name as name','product_orders.price as price','product_orders.price_sale as price_sale', 'product_orders.quantity as quantity','orders.id as id', 'products.id as product_id', 'orders.created_at as created_at' , 'statuses.name as status_name')
					-> get();
		$listOrder = DB::table('orders')
					-> where('orders.user_id','=',$id)
					-> join('statuses','orders.status_id','=','statuses.id')
					-> select('orders.id as id', 'statuses.name as status_name','statuses.display_name as display_name','orders.created_at as created_at')
					-> get();
		return view('customer.profile.order',compact('user', 'listOrder', 'listOrderDetail'));
	}
}
