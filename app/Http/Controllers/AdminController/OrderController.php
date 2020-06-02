<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\Product;
use App\Models\Status;
use App\Models\Setting;
use DB;
use Carbon\Carbon;
use App\Models\User;

class OrderController extends Controller
{
    private $order;
    private $product;
    private $productOrder;
    private $status;
    private $setting;
    private $user;
    public function __construct(User $user, Order $order, Product $product, ProductOrder $productOrder, Status $status, Setting $setting)
    {
        $this->order = $order;
        $this->product = $product;
        $this->productOrder = $productOrder;
        $this->status = $status;
        $this->setting = $setting;
        $this->user = $user;
    }
    public function getOrder()
    {

        $listOrder = $this->order->all();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }

    public function getDetailOrder($id)
    {
        $feeship = $this->setting->where('config_key', 'feeship')->value('config_value');
        $findorder = $this->order->findOrfail($id);
        $totalprice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->join('products', 'product_orders.product_id', '=', 'products.id')
            ->where('orders.id', $id)
            ->select('products.feature_image_path as feature_image_path', 'orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'products.feature_image_path as feature_image_path', 'products.id as id', 'products.name as name', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.detail', compact('findorder', 'totalprice', 'status', 'feeship'));
    }


    public function updateOrder($id, Request $request)
    {
        $order_find = $this->order->findOrfail($id)->value('id');
        $this->order->findOrfail($id)->update([

            'status_id' => $request->select,
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }


    public function deleteOrder($id)
    {
        $this->order->findOrfail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
    public function postSearch(Request $request)
    {
        $name_text = $request->name_text;
        $phone_text = $request->phone_text;
        $ID_order = $request->ID_order;
        $ID_product = $request->ID_product;
        $name_product = $request->name_product;

        $j = 0;
        $listOrder = [];

        if ($name_text != null) {
            $listOrderUserName = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('users.name', 'like', '%' . $name_text . '%')
                ->select('orders.id as id', 'orders.created_at as created_at', 'users.name as name', 'users.phone_number as phone_number', 'users.address as address', 'orders.status_id as status_id')
                ->get();
            $listOrderCustomerName = DB::table('orders')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->where('customers.name', 'like', '%' . $name_text . '%')
                ->select('orders.id as id', 'orders.created_at as created_at', 'customers.name as name', 'customers.phone_number as phone_number', 'customers.address as address', 'orders.status_id as status_id')
                ->get();
            foreach ($listOrderUserName as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
            foreach ($listOrderCustomerName as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
        }
        if ($phone_text != null) {
            $listOrderUserPhone = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('users.phone_number', 'like', '%' . $phone_text . '%')
                ->select('orders.id as id', 'orders.created_at as created_at', 'users.name as name', 'users.phone_number as phone_number', 'users.address as address', 'orders.status_id as status_id')
                ->get();
            $listOrderCustomerPhone = DB::table('orders')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->where('customers.phone_number', 'like', '%' . $phone_text . '%')
                ->select('orders.id as id', 'orders.created_at as created_at', 'customers.name as name', 'customers.phone_number as phone_number', 'customers.address as address', 'orders.status_id as status_id')
                ->get();

            foreach ($listOrderUserPhone as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
            foreach ($listOrderCustomerPhone as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
        }
        if ($ID_order != null) {
            $OrderUserID_Order = DB::table('orders')
                ->where('orders.id', $ID_order)
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id as id', 'orders.created_at as created_at', 'users.name as name', 'users.phone_number as phone_number', 'users.address as address', 'orders.status_id as status_id')
                ->get();
            $OrderCustomerID_Order = DB::table('orders')
                ->where('orders.id', $ID_order)
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->select('orders.id as id', 'orders.created_at as created_at', 'customers.name as name', 'customers.phone_number as phone_number', 'customers.address as address', 'orders.status_id as status_id')
                ->get();
            $listOrder[$j] = $OrderUserID_Order;
            $j = $j + 1;
            $listOrder[$j] = $OrderCustomerID_Order;
            $j = $j + 1;
        }
        if ($ID_product != null) {
            $listOrderUserID_Product = DB::table('product_orders')
                ->where('product_id', $ID_product)
                ->join('orders', 'product_orders.order_id', '=', 'orders.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id as id', 'orders.created_at as created_at', 'users.name as name', 'users.phone_number as phone_number', 'users.address as address', 'orders.status_id as status_id')
                ->get();

            $listOrderCustomerID_Product = DB::table('product_orders')
                ->where('product_id', $ID_product)
                ->join('orders', 'product_orders.order_id', '=', 'orders.id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->select('orders.id as id', 'orders.created_at as created_at', 'customers.name as name', 'customers.phone_number as phone_number', 'customers.address as address', 'orders.status_id as status_id')
                ->get();
            foreach ($listOrderUserID_Product as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
            foreach ($listOrderCustomerID_Product as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
        }
        if ($name_product != null) {
            $listOrderUsername_Product = DB::table('product_orders')
                ->join('products', 'products.id', '=', 'product_orders.product_id')
                ->where('products.name', 'like', '%' . $name_product . '%')
                ->join('orders', 'product_orders.order_id', '=', 'orders.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id as id', 'orders.created_at as created_at', 'users.name as name', 'users.phone_number as phone_number', 'users.address as address', 'orders.status_id as status_id')
                ->distinct()
                ->get();
            $listOrderCustomername_Product = DB::table('product_orders')
                ->join('products', 'products.id', '=', 'product_orders.product_id')
                ->where('products.name', 'like', '%' . $name_product . '%')
                ->join('orders', 'product_orders.order_id', '=', 'orders.id')
                ->join('customers', 'orders.customer_id', '=', 'customers.id')
                ->select('orders.id as id', 'orders.created_at as created_at', 'customers.name as name', 'customers.phone_number as phone_number', 'customers.address as address', 'orders.status_id as status_id')
                ->distinct()
                ->get();
            foreach ($listOrderUsername_Product as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
            foreach ($listOrderCustomername_Product as $item) {
                $listOrder[$j] = $item;
                $j = $j + 1;
            }
        }

        //dd($OrderUserID_Product);
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->join('products', 'product_orders.product_id', '=', 'products.id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        $output = array_map("unserialize", array_unique(array_map("serialize", $listOrder)));
        return view('admin.order.search', compact('name_text', 'phone_text', 'ID_product', 'ID_order', 'output', 'totalPrice', 'status', 'mytime'));
    }


    public function searchToday()
    {
        $today = Carbon::now()->format('Y-m-d');
        $listOrder = $this->order->whereDate('created_at', $today)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }

    public function searchYesterday()
    {
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $listOrder = $this->order->whereDate('created_at', $yesterday)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }
    public function searchWeek()
    {
        $weekk = new Carbon('last monday');
        $listOrder = $this->order->whereDate('created_at', '>=', $weekk)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }
    public function searchLastWeek(Request $request)
    {
        $weekk = new Carbon('last monday');
        $lastweekk = (new Carbon('last monday'))->subWeek();
        $listOrder = $this->order->whereDate('created_at', '>=', $lastweekk)->whereDate('created_at', '<', $weekk)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }
    public function searchMonth()
    {
        $monthh = Carbon::now()->month;
        $yearr = Carbon::now()->year;
        $listOrder = $this->order->whereMonth('created_at', '=', $monthh)->whereYear('created_at', $yearr)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }
    public function searchLastMonth()
    {
        $monthh = Carbon::now()->month - 1;
        $yearr = Carbon::now()->year;
        $listOrder = $this->order->whereMonth('created_at', '=', $monthh)->whereYear('created_at', $yearr)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }
    public function searchYear()
    {
        $yearr = Carbon::now()->year;
        $listOrder = $this->order->whereYear('created_at', $yearr)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }
    public function searchLastYear()
    {
        $yearr = Carbon::now()->year - 1;
        $listOrder = $this->order->whereYear('created_at', $yearr)->get();
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();
        return view('admin.order.view', compact('listOrder', 'totalPrice', 'status'));
    }


    public function listOrderOfUser($id)
    {
        $user = $this->user->findOrFail($id);
        $listOrderDetail = DB::table('orders')
            ->where('orders.user_id', '=', $id)
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->join('products', 'product_orders.product_id', '=', 'products.id')
            ->join('statuses', 'orders.status_id', '=', 'statuses.id')
            ->select('products.feature_image_path as image', 'products.name as name', 'product_orders.price as price', 'product_orders.price_sale as price_sale', 'product_orders.quantity as quantity', 'orders.id as id', 'products.id as product_id', 'orders.created_at as created_at', 'statuses.name as status_name')
            ->get();
        $listOrder = DB::table('orders')
            ->where('orders.user_id', '=', $id)
            ->join('statuses', 'orders.status_id', '=', 'statuses.id')
            ->select('orders.id as id', 'statuses.name as status_name', 'statuses.display_name as display_name', 'orders.created_at as created_at')
            ->get();
        return view('admin.order.list_order_of_user', compact('user', 'listOrderDetail', 'listOrder'));
    }
}
