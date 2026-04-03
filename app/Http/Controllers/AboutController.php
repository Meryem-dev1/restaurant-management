<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;

class AboutController extends Controller
{
    public function index()
    {
        $chefs= Chef::all();
        return view('about', compact('chefs'));
    }
}
