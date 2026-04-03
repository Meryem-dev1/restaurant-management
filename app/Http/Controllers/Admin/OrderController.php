<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Server;
use App\Models\Table;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::paginate(4);
        return view('admin.orders.index',compact('orders'));
    }



    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the resource.
     */
    public function show(Order $order)
    {
        $servers=Server::all();
        $tables=Table::all();
        return view('admin.orders.show',compact('order','servers','tables'));
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit',compact('order'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request,Order $order)
    {
        $order->update($request->post());

        return redirect()->route('admin.orders.index')->with('success','Order updated successfuly.');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(Order $order)
    {

    }
}
