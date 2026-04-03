<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Server;
use App\Models\Table;
use App\Models\Category;

use App\Http\Requests\PaymentsRequest;
class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        //
        $orders = Order::orderBy("created_at", "DESC")->paginate(10);
        $servers=Server::all();

        return view("orders.index")->with([
            "orders" => $orders,"servers"=>$servers
        ]);
    }



    public function store(PaymentsRequest $request){
        $order = new Order();
        $order->server_id = $request->server_id;
        $order->total_price = $request->total_price;
        $order->payment_status = $request->payment_status;
        $order->payment_type = $request->payment_type;
        $order->save();

        // Sync menus with their quantities
        $menus = [];
        foreach ($request->menu_id as $menuId) {
            $menus[$menuId] = ['quantity' => $request->menu_quantity[$menuId]];
        }
        $order->menus()->sync($menus);

        // Sync tables
        $order->tables()->sync($request->table_id);

        return redirect()->back()->with(["success" => "Order created successfully"]);
    }





   public function edit($id)
   {
       $orders= Order::findOrFail($id);
       $tables =$orders->tables()->where('order_id', $orders->id)->get();
       $menus = $orders->menus()->where('order_id', $orders->id)->get();
       $categories=Category::all();
       return view("orders.edit")->with([
           "tables" => $tables,
           "menus" => $menus,
           "orders" => $orders,
           "servants"=>Server::all(),
           "categories"=>$categories

       ]);
   }

   public function update(PaymentsRequest $request, $id)
   {
       $order = Order::findOrFail($id);
      $order->server_id = $request->server_id;
      $order->total_price = $request->total_price;
      $order->payment_status = $request->payment_status;
      $order->payment_type = $request->payment_type;
      $order->update();
      $order->menus()->sync($request->menu_id);
      $order->tables()->sync($request->table_id);
       return redirect()->route('payments.index')->with([
           "success" => "Payment updated successfully"
       ]);
   }

   public function destroy($id)
   {
      $order = Sales::findOrFail($id);
      $order->delete();
       return redirect()->back()->with([
           "success" => "Payment deleted successfully"
       ]);
   }

}
