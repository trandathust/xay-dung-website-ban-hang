<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Exports\SaleProductExport;
use App\Exports\InventoryProductExport;
use App\Exports\SellingProductExport;
use App\Exports\AllProductExport;
use App\Exports\Order\exportOrderToday;
use App\Exports\Order\exportOrderYesterday;
use App\Exports\Order\exportOrderWeek;
use App\Exports\Order\exportOrderLastWeek;
use App\Exports\Order\exportOrderMonth;
use App\Exports\Order\exportOrderLastMonth;
use App\Exports\Order\exportOrderYear;
use App\Exports\Order\exportOrderLastYear;
use App\Exports\Order\exportOrder;

class ExportExcelController extends Controller
{
    public function exportSaleProduct()
    {
        return Excel::download(new SaleProductExport, 'Sản Phẩm Khuyến Mại.xlsx');
    }

    public function exportInventoryProduct()
    {
        return Excel::download(new InventoryProductExport(), 'Hàng Tổn.xlsx');
    }

    public function exportSellingProduct()
    {
        return Excel::download(new SellingProductExport, 'Sản Phẩm Bán Chạy.xlsx');
    }
    public function exportAllProduct(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        return Excel::download(new AllProductExport($start_date, $end_date), 'Tất Cả Sản Phẩm.xlsx');
    }
    public function exportOrderToday()
    {
        return Excel::download(new exportOrderToday(), 'Đơn Hàng Hôm Nay.xlsx');
    }
    public function exportOrderYesterday()
    {
        return Excel::download(new exportOrderYesterday(), 'Đơn Hàng Hôm Qua.xlsx');
    }
    public function exportOrderWeek()
    {
        return Excel::download(new exportOrderWeek(), 'Đơn Hàng Tuần Này.xlsx');
    }
    public function exportOrderLastWeek()
    {
        return Excel::download(new exportOrderLastWeek(), 'Đơn Hàng Tuần Trước.xlsx');
    }
    public function exportOrderMonth()
    {
        return Excel::download(new exportOrderMonth(), 'Đơn Hàng Tháng Này.xlsx');
    }
    public function exportOrderLastMonth()
    {
        return Excel::download(new exportOrderLastMonth(), 'Đơn Hàng Tháng Trước.xlsx');
    }
    public function exportOrderYear()
    {
        return Excel::download(new exportOrderYear(), 'Đơn Hàng Năm Nay.xlsx');
    }
    public function exportOrderLastYear()
    {
        return Excel::download(new exportOrderLastYear(), 'Đơn Hàng Năm Trước.xlsx');
    }
    public function exportOrder()
    {
        return Excel::download(new exportOrder(), 'Tất Cả Đơn Hàng.xlsx');
    }
}
