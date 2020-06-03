<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use DB;
use App\Models\Product;
use App\Models\Status;
use App\Models\Blog;

class DashboardController extends Controller
{
    private $order;
    private $status;
    private $blog;
    public function __construct(Order $order, Status $status, Blog $blog)
    {
        $this->order = $order;
        $this->status = $status;
        $this->blog = $blog;
    }
    public function getDashboard()
    {
        $month = Carbon::now()->month; //tháng này
        $year = Carbon::now()->year;
        $time_now = Carbon::now()->format('Y-m-d');

        //tiền hàng theo tháng
        $orderSaleOfMonth = DB::table('orders')
            ->select(DB::raw('month(created_at) as getMonth'), DB::raw('SUM(total_money) as value'))
            ->whereYear('created_at', '>=', $year)
            ->groupBy('getMonth')
            ->orderBy('getMonth', 'ASC')
            ->get();
        //tiền hàng tính đến thời điểm hiện tại trong tháng
        $lastmonth = Carbon::now()->subMonth()->format('Y-m-d');
        $sale_now = DB::table('orders')
            ->select(DB::raw('day(created_at) as getDay'), DB::raw('SUM(total_money) as value'))
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $year)
            ->groupBy('getDay')
            ->orderBy('getDay', 'ASC')
            ->get();
        $total_money_now = 0;
        foreach ($sale_now as $key => $value) {
            $total_money_now = $total_money_now + $value->value;
        }
        $sale_last_month = DB::table('orders')
            ->select(DB::raw('day(created_at) as getDay'), DB::raw('SUM(total_money) as value'))
            ->whereMonth('created_at', '=', $month - 1)
            ->whereYear('created_at', '=', $year)
            ->whereDate('created_at', '<=', $lastmonth)
            ->groupBy('getDay')
            ->orderBy('getDay', 'ASC')
            ->get();
        $total_money_last_month = 0;
        foreach ($sale_last_month as $key => $value) {
            $total_money_last_month = $total_money_last_month + $value->value;
        }
        if ($total_money_last_month == 0) {
            $percent_money = $total_money_now * 100;
        } else {
            if ($total_money_last_month > $total_money_now) {
                $percent_money = round(-($total_money_last_month / $total_money_now - 1) * 100, 2);
            } else {
                $percent_money = round(($total_money_now / $total_money_last_month - 1) * 100, 2);
            }
        }



        //số đơn hàng theo ngày trong 30 ngày
        $day = Carbon::now()->subDays(30)->format('Y-m-d');
        $orderOfMonth = DB::table('orders')
            ->select(DB::raw('day(created_at) as getDay'), DB::raw('COUNT(*) as value'))
            ->whereDate('created_at', '>=', $day)
            ->groupBy('getDay')
            ->orderBy(DB::raw('created_at'), 'ASC')
            ->get();


        //Tổng quan sản phẩm
        //lấy ra danh sách sản phẩm bán chạy nhất trong 30 ngày
        $productSell = DB::table('product_orders')
            ->select(DB::raw('product_id as idProduct'), DB::raw('COUNT(*) as number'))
            ->whereDate('created_at', '>=', $day)
            ->groupBy('idProduct')
            ->orderBy('number', 'DESC')
            ->get();
        $productSell_Good = [];
        $listProductSale_Good = [];
        if (count($productSell) != 0) {
            for ($i = 0; $i < 4; $i++) {
                if ($i == count($productSell)) break;
                $productSell_Good[$i] = $productSell[$i];
            }
            $listProductSale_Good = $this->listProductSale($productSell_Good);
        }


        $day_old = Carbon::now()->subDays(60)->format('Y-m-d');
        $percent_product = [];
        foreach ($productSell_Good as $key => $value) {
            $productSell_old = DB::table('product_orders')
                ->where('product_id', $value->idProduct)
                ->select(DB::raw('COUNT(*) as number'))
                ->whereDate('created_at', '<', $day)
                ->whereDate('created_at', '>=', $day_old)
                ->value('number');
            if ($productSell_old == 0) {
                $percent_product[] = $value->number * 100;
            } else {
                if ($productSell_old > $value->number) {
                    $percent_product[] = round(-($productSell_old / $value->number - 1) * 100, 2);
                } else {
                    $percent_product[] = round(($value->number / $productSell_old - 1) * 100, 2);
                }
            }
        }

        //xem sản phẩm mới thêm

        $listProduct = DB::table('products')
            ->latest()->paginate(5);
        $listOrder = $this->order
            ->latest()->paginate(4);
        $totalPrice = DB::table('orders')
            ->join('product_orders', 'orders.id', '=', 'product_orders.order_id')
            ->join('products', 'product_orders.product_id', '=', 'products.id')
            ->select('orders.id as order_id', 'product_orders.price as price', 'product_orders.quantity as quantity', 'product_orders.price_sale as price_sale')
            ->get();
        $status = $this->status->all();

        // xem bài viết mới
        $listBlog = $this->blog
            ->latest()->paginate(4);
        return view('admin.admin_content', compact('listBlog', 'orderOfMonth', 'orderSaleOfMonth', 'percent_money', 'listProductSale_Good', 'time_now', 'percent_product', 'listProduct', 'listOrder', 'totalPrice', 'status'));
    }

    function listProductSale($product)
    {
        foreach ($product as $key => $value) {
            $ProductSell = DB::table('products')
                ->where('id', $value->idProduct)
                ->select('id as id', 'products.name as name', 'products.price as price', 'products.price_sale as price_sale', 'products.end_sale as end_sale', 'products.feature_image_path as image')
                ->get()->toArray();
            $listProductSell[] = ([
                'id' => $value->idProduct,
                'name' => $ProductSell[0]->name,
                'price' => $ProductSell[0]->price,
                'price_sale' => $ProductSell[0]->price_sale,
                'end_sale' => $ProductSell[0]->end_sale,
                'number' => $value->number,
                'image' => $ProductSell[0]->image,
            ]);
        }
        return ($listProductSell);
    }
}
