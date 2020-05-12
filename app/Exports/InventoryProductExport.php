<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Carbon\Carbon;

class InventoryProductExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //hàng tồn
        $dt = Carbon::now()->subDays(30);
        $listInventory = [];
        //tìm tất cả sản phẩm được tạo từ 30 ngày trước.
        $listProductInventory = DB::table('products')
            ->whereDate('created_at', '<', '$dt')
            ->whereNull('deleted_at')
            ->get();
        //từ những sản phẩm đó tìm ra những sản phẩm không có ai mua
        foreach ($listProductInventory as $item) {
            $count = DB::table('product_orders')->where('product_id', '=', $item->id)->count();
            if ($count == 0) {
                $listInventory[] = ([
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'price_sale' => $item->price_sale,
                    'quantity' => $item->quantity,
                    'content' => $item->content,
                    'start_sale' => $item->start_sale,
                    'end_sale' => $item->end_sale,
                    'size' => $item->size,
                    'weight' => $item->weight,
                ]);
            }
        }
        if (empty($listInventory))
            return abort(404);
        return $listInventory;
    }
}
