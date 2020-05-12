<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Http\Requests\AdminRequest\BrandRequest;

class BrandController extends Controller
{
	private $brand;
	public function __construct(Brand $brand){
		$this -> brand = $brand;
	}
    public function getAddBrand(){
    	$listBrand = $this -> brand -> all();
    	return view('admin.brand.add', compact('listBrand'));
    }
    public function postAddBrand(BrandRequest $request){
        try {
            $brand= $this -> brand -> create([
                'name' => $request -> name,
                'slug' => str_slug($request -> name),
                'description' => $request -> description,
            ]);
            return response() -> json([
                'id' => $brand -> id,
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
    public function getEditBrand ($id){
    	$listBrand = $this -> brand -> all();
    	$brand = $this -> brand -> findOrfail($id);
    	return view('admin.brand.edit',compact('brand','listBrand'));
    }
    public function postEditBrand (BrandRequest $request, $id){
        try {
            $this->brand->find($id)->update([
                'name' => $request -> name,
                'slug' => str_slug($request -> name),
                'description' => $request -> description,
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
    public function DeleteBrand ($id){
    	try {
            $this->brand->find($id)->delete();
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
