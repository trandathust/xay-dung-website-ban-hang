<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use DB;
use App\Http\Requests\CustomerRequest\ProductDetailRequest;
use App\Models\ProductComment;
use Carbon;

class ProductController extends Controller
{
    private $product;
    private $productimage;
    private $productcomment;
    public function __construct(Product $product, ProductImage $productimage, ProductComment $productcomment){
    	$this -> product = $product;
    	$this -> productimage = $productimage;
        $this -> productcomment = $productcomment;
    }
    public function getProductDetail($id){
    	$product = $this-> product -> findOrfail($id);
    	$list_image = $this -> productimage -> where('product_id',$id)->paginate(3);
    	$data = $list_image -> pluck('id') -> toArray();
    	
    	$productimage = $this-> productimage-> where('product_id',$id) -> whereNotIn('id',$data)->paginate(3);
    	$recomment_first = $this -> product -> where('category_id',$product-> category_id)->paginate(3);
    	$recomment_second = $this -> product -> where('brand_id',$product -> brand_id)->paginate(3);

        $listComment = $this -> productcomment -> where('product_id',$id)->get();
        $timenow = Carbon\Carbon::now()->toDateTimeString();
    	return view('customer.pages.product_detail', compact('product','list_image','productimage','recomment_first','recomment_second','listComment','timenow'));
    }


    public function postProductDetail($id, ProductDetailRequest $request){
        $this -> productcomment -> create([
            'comment' => $request -> comment,
            'product_id' => $request -> product_id,
            'user_id' => $request -> user_id,
        ]);
        return response() -> json([
                'code' => 200,
                'message' => 'success'
            ], 200);
    }
}
