<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;

class AllProductExport implements FromCollection, WithHeadings
{
    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        if ($this->end_date && $this->start_date) {
            $listProduct = DB::table('products')
                ->whereDate('created_at', '<', $this->end_date)
                ->whereDate('created_at', '>', $this->start_date)
                ->select('id', 'name', 'price', 'content', 'quantity', 'price_sale', 'start_sale', 'end_sale', 'size', 'weight')
                ->get();
        } elseif ($this->start_date && $this->end_date == null) {
            $listProduct = DB::table('products')
                ->whereDate('created_at', '>', $this->start_date)
                ->select('id', 'name', 'price', 'content', 'quantity', 'price_sale', 'start_sale', 'end_sale', 'size', 'weight')
                ->get();
        } elseif ($this->start_date == null && $this->end_date) {
            $listProduct = DB::table('products')
                ->whereDate('created_at', '<', $this->end_date)
                ->select('id', 'name', 'price', 'content', 'quantity', 'price_sale', 'start_sale', 'end_sale', 'size', 'weight')
                ->get();
        } else {
            $listProduct = DB::table('products')
                ->select('id', 'name', 'price', 'content', 'quantity', 'price_sale', 'start_sale', 'end_sale', 'size', 'weight')
                ->get();
        }
        return $listProduct;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Price',
            'Miêu Tả Sản Phẩm',
            'Số Lượng',
            'Giá Giảm',
            'Bắt Đầu KM',
            'Kết Thúc KM',
            'Kích Cỡ',
            'Trọng Lượng',
        ];
    }
}
