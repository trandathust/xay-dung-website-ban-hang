<?php

namespace App\Exports\Order;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Carbon\Carbon;

class exportOrderLastYear implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $yearr = Carbon::now()->year - 1;
        $listOrderToDay = [];
        $i = 0;
        $listOrderToDay_ = DB::table('orders')
            ->whereYear('orders.created_at', '=', $yearr)
            ->join('statuses', 'orders.status_id', '=', 'statuses.id')
            ->select('orders.*', 'statuses.display_name as status_name')
            ->get();
        foreach ($listOrderToDay_ as $item) {
            if ($item->user_id) {
                $user = DB::table('users')->where('id', $item->user_id)->get();
                // dd($user);
                $listOrderToDay[$i] = ([
                    'id' => $item->id,
                    'name' => $user[0]->name,
                    'phone_number' => $user[0]->phone_number,
                    'address' => $user[0]->address,
                    'email' => $user[0]->email,
                    'created_at' => $item->created_at,
                    'status' => $item->status_name,
                    'total' => $item->total_money
                ]);
            } else {
                $customer = DB::table('customers')->where('id', $item->customer_id)->get();
                $listOrderToDay[$i] = ([
                    'id' => $item->id,
                    'name' => $customer[0]->name,
                    'phone_number' => $customer[0]->phone_number,
                    'address' => $customer[0]->address,
                    'email' => null,
                    'created_at' => $item->created_at,
                    'status' => $item->status_name,
                    'total' => $item->total_money
                ]);
            }
            $i = $i + 1;
        }
        return collect($listOrderToDay);
    }

    public function headings(): array
    {
        return [
            'Mã Đơn Hàng',
            'Tên Khách Hàng',
            'Số Điện Thoại',
            'Địa Chỉ',
            'Email',
            'Ngày Tạo',
            'Trạng Thái',
            'Tổng Tiền',
        ];
    }
}
