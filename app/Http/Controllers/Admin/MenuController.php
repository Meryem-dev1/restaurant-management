<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        $chefs=Chef::all();
        $menus=Menu::paginate(3);
        return view('admin.menus.index',compact('menus','categories','chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $chefs=Chef::all();
        return view('admin.menus.create',compact('categories','chefs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $image=$request->file('image')->store('menus','public');

        $product=Menu::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'ingredients'=>$request->ingredients,
            'description'=>$request->description,
            'chef_id'=>$request->chef_id,
            'category_id'=>$request->category_id,
            'image'=>$image
        ]);

        return redirect()->route('admin.menus.index')->with('success','Menu created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        $categories=Category::all();
        $chefs=Chef::all();
        return view('admin.menus.show',compact('menu','chefs','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $categories=Category::all();
        $chefs=Chef::all();
        return view('admin.menus.edit',compact('menu','categories','chefs'));
    }

    /**
     *
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $image=$menu->image;

        if($request->hasFile('image')){
            Storage::delete($menu -> image);
            $image=$request->file('image')->store('menus','public');
        }

        $menu->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'ingredients'=>$request->ingredients,
            'description'=>$request->description,
            'chef_id'=>$request->chef_id,
            'category_id'=>$request->category_id,
            'image'=>$image,
        ]);

        return redirect()->route('admin.menus.index')->with('success','Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('danger','Menu deleted successfully');
    }
}
