<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest\CartRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Carbon;

class CartController extends Controller
{
	private $product;
	public function __construct(Product $product){
		$this -> product = $product;
	}
	public function getCart(){
        $timenow = Carbon\Carbon::now()->toDateTimeString();
		return view('customer.pages.cart',compact('timenow'));
	}


	public function saveCart(Request $request,$id){
		$product = $this->product->findOrfail($id);
		$cart = session()->get('cart');
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "id" => $product -> id,
                        "name" => $product-> name,
                        "quantity" => $request -> quantity,
                        "price" => $product-> price,
                        "price_sale" => $product-> price_sale,
                        "end_sale" => $product -> end_sale,
                        "feature_image_path" => $product-> feature_image_path
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return response() -> json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']= $cart[$id]['quantity'] + $request -> quantity;
 
            session()->put('cart', $cart);
 
            return response() -> json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product -> id,
            "name" => $product->name,
            "quantity" => $request -> quantity,
            "price" => $product->price,
            "price_sale" => $product-> price_sale,
            "end_sale" => $product -> end_sale,
          	"feature_image_path" => $product->feature_image_path
        ];
 
        session()->put('cart', $cart);
        return response() -> json([
                'code' => 200,
                'message' => 'success'
            ], 200);
	}

	public function update(Request $request)
    {
        if($request->id and $request->quantity and $request->note == 1)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]++;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        elseif($request->id and $request->quantity and $request->note == 0){
        	$cart = session()->get('cart');
            $cart[$request->id]["quantity"]--;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function reOrder($id){

        
        dd($id);

        return redirect()-> route('getCheckout');
    }
}
