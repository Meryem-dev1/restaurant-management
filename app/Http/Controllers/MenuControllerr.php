<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class MenuControllerr extends Controller
{
public function index()
{
    $categories = Category::with('menus')->get();
    return view('menu', compact('categories'));
}
    public function showMenu()
    {
        $categories = Category::all();

    // Récupérer toutes les catégories depuis la base de données
        return view('menu', ['categories' => $categories]);
    }
}

