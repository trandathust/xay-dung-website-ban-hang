<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Carbon\Carbon;

class SaleProductExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        $now = Carbon::now()->toDateTimeString();
        $listProductSale = DB::table('products')
            ->where('end_sale', '>', $now)
            ->whereNull('deleted_at')
            ->select('id', 'name', 'price', 'content', 'quantity', 'price_sale', 'start_sale', 'end_sale', 'size', 'weight')
            ->get();
        if (empty($listProductSale))
            return abort(404);
        return $listProductSale;
    }
}
