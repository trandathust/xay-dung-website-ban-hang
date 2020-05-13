<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Carbon\Carbon;


class SellingProductExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //sản phẩm bán chạy
        $day = Carbon::now()->subDays(30)->format('Y-m-d');
        $listproduct = DB::table('product_orders')
            ->select(DB::raw('product_id as idProduct'), DB::raw('COUNT(*) as number'))
            ->groupBy('idProduct')
            ->orderBy('number', 'DESC')
            ->get();
        foreach ($listproduct as $key => $value) {
            $ProductSell = DB::table('products')
                ->where('id', $value->idProduct)
                ->get();
            $listProductSell[] = ([
                'id' => $value->idProduct,
                'name' => $ProductSell[0]->name,
                'price' => $ProductSell[0]->price,
                'price_sale' => $ProductSell[0]->price_sale,
                'quantity' => $ProductSell[0]->quantity,
                'content' => $ProductSell[0]->content,
                'start_sale' => $ProductSell[0]->start_sale,
                'end_sale' => $ProductSell[0]->end_sale,
                'size' => $ProductSell[0]->size,
                'weight' => $ProductSell[0]->weight,
                'count' => $value->number,
            ]);
        }
        return collect($listProductSell);
    }
}
