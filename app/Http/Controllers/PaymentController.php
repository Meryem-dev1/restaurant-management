<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Category;
use App\Models\Server;

class PaymentController extends Controller
{
  public function index()
  {
    return view("payments.index")->with([
        "tables"=>Table::all(),
        "categories"=>Category::all(),
        "servants"=>Server::all()
    ]);
  }
}
