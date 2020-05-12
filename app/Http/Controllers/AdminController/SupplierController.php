<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\AdminRequest\SupplierRequest;

class SupplierController extends Controller
{
	private $supplier;

	public function __construct(Supplier $supplier){
		$this -> supplier = $supplier;
	}


	public function getSupplier(){
		$listSupplier = $this -> supplier -> all();
		return view('admin.supplier.add', compact('listSupplier'));
	}

	public function postSupplier(SupplierRequest $request){
		try {
			$supplier = $this -> supplier -> create([
				'name' => $request -> name,
				'email' => $request -> email,
				'phone_number' => $request -> phone_number,
				'address' => $request -> address,
			]);
			return response() -> json([
				'id' => $supplier -> id,
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

	public function getEditSupplier($id){
		$supplier = $this -> supplier -> findOrFail($id);
		$listSupplier = $this -> supplier -> all();
		return view('admin.supplier.edit',compact('supplier','listSupplier'));
	}
	public function postEditSupplier($id, SupplierRequest $request){
		try {
			$this -> supplier -> find($id) -> update([
				'name' => $request -> name,
				'email' => $request -> email,
				'phone_number' => $request -> phone_number,
				'address' => $request -> address,
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


	public function deleteSupplier($id){
		try {
			$this-> supplier ->find($id)->delete();
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
