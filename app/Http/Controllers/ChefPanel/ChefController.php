<?php

namespace App\Http\Controllers\ChefPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu_order;

class ChefController extends Controller
{
    public function index(){
        $orders=Menu_order ::all();
        return view('chef.index',compact('orders'));
    }
}
