<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Detail_order;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index(){

        // if(Auth::id())
        // {
        //     $usertype=Auth()->User()->is_admin;
        //     if($usertype===0){
        //         return view('home');
        //     }elseif($usertype===1){
        //         return view("admin.index");
        //     }
        // }
        $menus = Menu::all();
        $chefs = Chef::all();

        return view('home', ['menus' => $menus,'chefs'=>$chefs]);
    }
    public function thankyou()
    {
        return view('thankyou');
    }









}
