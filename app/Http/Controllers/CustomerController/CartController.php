<?php

namespace App\Http\Controllers\CustomerController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest\CartRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Carbon;
use DB;

class CartController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function getCart()
    {
        $timenow = Carbon\Carbon::now()->toDateTimeString();
        return view('customer.pages.cart', compact('timenow'));
    }


    public function saveCart(Request $request, $id)
    {
        $product = $this->product->findOrfail($id);
        $cart = session()->get('cart');
        //nếu giỏ hàng không tồn tại
        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => $request->quantity,
                    "price" => $product->price,
                    "price_sale" => $product->price_sale,
                    "end_sale" => $product->end_sale,
                    "feature_image_path" => $product->feature_image_path
                ]
            ];

            session()->put('cart', $cart);

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }
        //nếu giỏ hàng đã tồn tại, check thấy sản phẩm này đã có thì tăng số lượng lên
        if (isset($cart[$id])) {

            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $request->quantity;

            session()->put('cart', $cart);

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        }
        // nếu giỏ hàng đã tồn tại, nhưng chưa có sản phẩm này thì tạo mới 1 sp trong giỏ
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "price_sale" => $product->price_sale,
            "end_sale" => $product->end_sale,
            "feature_image_path" => $product->feature_image_path
        ];

        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity and $request->note == 1) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]++;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        } elseif ($request->id and $request->quantity and $request->note == 0) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"]--;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function reOrder($id)
    {
        $cart = session()->get('cart');
        $product = DB::table('orders')
            ->where('orders.id', $id)
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->join('products', 'products.id', '=', 'product_orders.product_id')
            ->select('products.id as id', 'products.name as name', 'products.price as price', 'products.price_sale as price_sale', 'products.feature_image_path as feature_image_path', 'products.end_sale as end_sale', 'product_orders.quantity as quantity')
            ->get();
        foreach ($product as $item) {
            $id = $item->id;
            //nếu giỏ hàng không tồn tại
            if (!$cart) {
                $cart = [
                    $id => [
                        "id" => $item->id,
                        "name" => $item->name,
                        "quantity" => $item->quantity,
                        "price" => $item->price,
                        "price_sale" => $item->price_sale,
                        "end_sale" => $item->end_sale,
                        "feature_image_path" => $item->feature_image_path
                    ]
                ];
                session()->put('cart', $cart);
            }
            //nếu giỏ hàng đã tồn tại, check thấy sản phẩm này đã có thì tăng số lượng lên
            elseif (isset($cart[$id])) {
                dd(1);
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $item->quantity;
                session()->put('cart', $cart);
            }
            // nếu giỏ hàng đã tồn tại, nhưng chưa có sản phẩm này thì tạo mới 1 sp trong giỏ
            else {
                $cart[$id] = [
                    "id" => $item->id,
                    "name" => $item->name,
                    "quantity" => $item->quantity,
                    "price" => $item->price,
                    "price_sale" => $item->price_sale,
                    "end_sale" => $item->end_sale,
                    "feature_image_path" => $item->feature_image_path
                ];

                session()->put('cart', $cart);
            }
        }
        //dd($cart, $product);
        return redirect()->route('getCheckout');
    }
}
