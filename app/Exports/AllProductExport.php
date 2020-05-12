<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class AllProductExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $listProduct = DB::table('products')
            ->select('id', 'name', 'price', 'content', 'quantity', 'price_sale', 'start_sale', 'end_sale', 'size', 'weight')
            ->get();
        return $listProduct;
    }
}
