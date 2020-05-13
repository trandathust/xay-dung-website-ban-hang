<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Exports\SaleProductExport;
use App\Exports\InventoryProductExport;
use App\Exports\SellingProductExport;
use App\Exports\AllProductExport;

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
}
