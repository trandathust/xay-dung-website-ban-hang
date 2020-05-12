<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive;
use Varidation;
use Illuminate\Support\Str;
use DB;
use App\Http\Requests\AdminRequest\CatagoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	private $categories;
	
	public function __construct(Category $categories){
		$this->categories = $categories;
	}
    public function getCategory($parentId){
        $data = $this-> categories ->all();
        $recusive=  new Recusive($data);
        $htmlOption = $recusive -> Recusive($parentId);
        return $htmlOption;
    }
    public function getAddCategory(){
    	
        $htmlOption = $this ->getCategory($parentId ='');
        $categories = $this-> categories ->all();
        return view('admin.categories.add',compact('htmlOption','categories'));

    }
    public function postAddCategory(CatagoryRequest $request){
        try {
            $category =  $this->categories->create([
                'name' => $request -> name,
                'parent_id' => $request -> parent_id,
                'slug' => str_slug($request -> name)
            ]);

            return response() -> json([
                'id' => $category -> id,
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
    //sửa danh mục sản phẩm
    public function getEditCategory($id){
        $category = $this -> categories -> find($id);
        $listcategories = $this-> categories ->all();

        $htmlOption = $this -> getCategory($category -> parent_id);

        return view('admin.categories.edit',compact('category','listcategories','htmlOption' ));

    }
    public function postEditCategory(CatagoryRequest $request, $id){
        try {
            $this -> categories -> find($id) -> update([
                'name' => $request -> name,
                'parent_id' => $request -> parent_id,
                'slug' => str_slug($request -> name)
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
    public function DeleteCategory($id){
        try {
            $this->categories->find($id)->delete();
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
