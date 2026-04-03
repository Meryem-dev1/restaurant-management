<?php

namespace App\Http\Controllers;
use App\Exports\OrdersExport;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\RaportRequest;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("reports.index");
    }

    public function generate(RaportRequest $request)
    {
        // Validation


        // Initialisation des variables
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . " 00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . " 23:59:59"));

        // Get data
        $orders = Order::whereBetween("created_at", [$startDate, $endDate])
            ->where("payment_status", "paid")->get();

        // Return data
        return view("reports.index",[
            "startDate" => $startDate,
            "endDate" => $endDate,
            "total" => $orders->sum('total_price'),
            "orders" => $orders
        ]);
    }





    public function export(Request $request)
    {
        return Excel::download(new OrdersExport($request->from, $request->to), "Orders.xlsx");
    }
}
