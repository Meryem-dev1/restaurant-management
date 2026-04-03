<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromView
{
    private $from;
    private $to;
    private $sales;
    private $total;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
        $this->sales = Order::whereBetween("created_at", [$from, $to])
            ->where("payment_status", "paid")->get();
        $this->total = $this->sales->sum("total_price");
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reports.export', [
            'total' => $this->total,
            'sales' => $this->sales,
            'to' => $this->to,
            'from' => $this->from,
        ]);
    }
}
