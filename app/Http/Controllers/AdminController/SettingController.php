<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\AdminRequest\SettingRequest;
use App\Http\Requests\AdminRequest\SettingRequest2;
use App\Http\Controllers\Controller;
use App\Traits\StorageImageTrait;
use Storage;
use Validator;

class SettingController extends Controller
{
	use StorageImageTrait;
	private $setting;
	public function __construct(Setting $setting){
		$this -> setting = $setting;
	}
	public function getAddSetting(){
		$listSetting = $this->setting->all();
		$phone = $this -> setting->where('config_key','phone_number') ->value('config_value');
		$email = $this -> setting-> where('config_key','email')->value('config_value');
		$footer = $this -> setting-> where('config_key','footer')->value('config_value');
		$logo = $this -> setting -> where('config_key','logo')->value('config_value');
		$address = $this -> setting -> where('config_key','address')->value('config_value');
		$google_map = $this -> setting -> where('config_key','google_map')->value('config_value');
		$feeship = $this -> setting -> where('config_key','feeship')->value('config_value');
		$nameshop = $this -> setting-> where('config_key','nameshop')->value('config_value');
		return view('admin.setting.add', compact('listSetting','phone', 'email', 'footer', 'logo','address','google_map','feeship','nameshop'));
	}
	public function postAddSetting(SettingRequest $request){
		try {
			$setting = $this -> setting -> create([
				'name' => $request -> name,
				'config_value' => $request -> config_value,
				'config_key' => $request -> config_key,
			]);
			return response() -> json([
				'id' => $setting -> id,
				'code' => 200,
				'message' => 'success'
			], 200);
		} catch (Exception $exception) {
			return response() -> json([
				'code' => 500,
				'message' => 'fail'
			], 500);
		}
		
	}


	public function getEditSetting($id){
		$listSetting = $this->setting->all();
		$phone = $this -> setting ->where('config_key','phone_number') ->value('config_value');
		$email = $this -> setting -> where('config_key','email')->value('config_value');
		$footer = $this -> setting -> where('config_key','footer')->value('config_value');
		$logo = $this -> setting -> where('config_key','logo')->value('config_value');
		$address = $this -> setting -> where('config_key','address')->value('config_value');
		$google_map = $this -> setting -> where('config_key','google_map')->value('config_value');
		$feeship = $this -> setting -> where('config_key','feeship')->value('config_value');
		$setting = $this -> setting -> findOrfail($id);
		$nameshop = $this -> setting-> where('config_key','nameshop')->value('config_value');
		return view('admin.setting.edit', compact('listSetting', 'setting', 'phone', 'email', 'footer','logo','address','google_map','feeship','nameshop'));
	}
	public function postEditSetting(SettingRequest $request, $id){
		try {
			$this -> setting -> findOrfail($id) -> update([
				'name' => $request -> name,
				'config_value' => $request -> config_value,
				'config_key' => $request -> config_key,
			]);
			return response() -> json([
				'code' => 200,
				'message' => 'success'
			], 200);
		} catch (Exception $exception) {
			return response() -> json([
				'code' => 500,
				'message' => 'fail'
			], 500);
		}
	}
	
	public function postEditGenaral(SettingRequest2 $request){
		try {
			$this-> setting->where('config_key','phone_number') -> update([
				'config_value' => $request -> phone_number
			]);
			$this-> setting->where('config_key','email') -> update([
				'config_value' => $request -> email
			]);
			$this-> setting->where('config_key','footer') -> update([
				'config_value' => $request -> footer
			]);
			$this-> setting->where('config_key','address') -> update([
				'config_value' => $request -> address
			]);
			$this-> setting->where('config_key','google_map') -> update([
				'config_value' => $request -> google_map
			]);
			$this-> setting->where('config_key','feeship') -> update([
				'config_value' => $request -> feeship
			]);
			$this-> setting->where('config_key','nameshop') -> update([
				'config_value' => $request -> nameshop
			]);
			return response() -> json([
				'code' => 200,
				'message' => 'success'
			], 200);
		} catch (Exception $exception) {
			return response() -> json([
				'code' => 500,
				'message' => 'fail'
			], 500);
		}
	}

	public function updateLogoSetting(Request $request){
			$validation = Validator::make($request->all(), [
				'select_file' => 'required'
			]);
			if($validation->passes())
			{
				$file = $request->file('select_file');
				//$new_name = rand() . '.' . $image->getClientOriginalExtension();
				//$image->move(public_path('images'), $new_name);
				$filenameHash =str_random(20) .'.' . $file->getClientOriginalExtension();
				$filepath = $file ->storeAs('public/' . 'logo' .'/' . auth() -> id(),$filenameHash);
				$filepath = Storage::url($filepath);
				$this -> setting -> where('config_key','logo')->update([
					'config_value' => $filepath
				]);
				return response() -> json([
				'code' => 200,
				'message' => 'success'
			], 200);
			}
			else
			{
				return response()->json([
					'message'   => $validation->errors()->all(),
					'uploaded_image' => '',
					'class_name'  => 'alert-danger'
				]);
			}
	}
	public function DeleteSetting($id){
		try {
			$this->setting->find($id)->delete();
			return response() -> json([
				'code' => 200,
				'message' => 'success'
			], 200);
			
		} catch (Exception $exception) {
			return response() -> json([
				'code' => 500,
				'message' => 'fail'
			], 500);
			
		}
	}
}
