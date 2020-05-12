<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest\SliderRequest;
use App\Traits\StorageImageTrait;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
	use StorageImageTrait;
	private $slider;
	public function __construct(Slider $slider){
		$this ->slider = $slider;
	}

    public function viewSlider(){
    	$listSlider = $this -> slider -> all();
    	return view('admin.slider.view', compact('listSlider'));
    }

    public function getAddSlider(){
    	return view('admin.slider.add');
    }


    public function postAddSlider(SliderRequest $request){
        $status = $request -> status;
        if($status == null)
            $status = 0;
    	$dataCreate = [
    		'name' => $request -> name,
    		'description' => $request -> description,
            'status' => $status,
            'url' => $request -> url,
    	];
        $image_path = $request -> image_path;
    	$dataImageSlider = $this -> storageTraitUpload($request, 'image_path', 'slider');
    	if(!empty($dataImageSlider)){
    		$dataCreate['image_name'] = $dataImageSlider['file_name'];
    		$dataCreate['image_path'] = $dataImageSlider['file_path'];
    	}
    	$this -> slider -> create($dataCreate);
    	return redirect() -> route('admin.viewslider');
    }

    public function getEditSlider($id){
    	$slider = $this -> slider -> find($id) ;
    	return view('admin.slider.edit',compact('slider'));
    }

    public function postEditSlider(SliderRequest $request, $id){
        $status = $request -> status;
        if($status == null)
            $status = 0;
    	$dataUpdate = [
    		'name' => $request -> name,
    		'description' => $request -> description,
            'status' => $status,
            'url' => $request -> url,
    	];
    	$dataImageSlider = $this -> storageTraitUpload($request, 'image_path', 'slider');
    	if(!empty($dataImageSlider)){
    		$dataUpdate['image_name'] = $dataImageSlider['file_name'];
    		$dataUpdate['image_path'] = $dataImageSlider['file_path'];
    	}
        
    	$this -> slider ->find($id)-> update($dataUpdate);
    	return redirect() -> route('admin.viewslider');
    }

    public function DeleteSlider($id){
    	try {
            $this ->slider -> find($id) -> delete();
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

    public function editStatus($id, Request $request ){
        $this -> slider -> findOrfail($id)-> update([
            'status' => $request -> status,
        ]);
        return response() -> json([
                'code' => 200,
                'message' => 'success'
            ], 200); 
    }

}
