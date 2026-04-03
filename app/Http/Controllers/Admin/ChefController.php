<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use App\Http\Requests\ChefRequest;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{

    public function index()
    {
        $chefs=Chef::paginate(3);
        return view('admin.chefs.index',compact('chefs'));
    }


    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('admin.chefs.create');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(ChefRequest $request)
    {
        $image=$request->file('image')->store('chefs','public');

        $chef=Chef::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'tel_number'=>$request->tel_number,
            'speciality'=>$request->speciality,
            'image'=>$image,
        ]);

        return redirect()->route('admin.chefs.index')->with('success','Chef created successfully');
    }

    /**
     * Display the resource.
     */
    public function show(Chef $chef)
    {
        return view('admin.chefs.show',compact('chef'));
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Chef $chef)
    {
        return view('admin.chefs.edit',compact('chef'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(ChefRequest $request,Chef $chef)
    {
        $image=$chef->image;

        if($request->hasFile('image')){
            Storage::delete($chef -> image);
            $image=$request->file('image')->store('chefs','public');
        }

        $chef->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'tel_number'=>$request->tel_number,
            'image'=>$image,
            'speciality'=>$request->speciality
        ]);

        return redirect()->route('admin.chefs.index')->with('success','Chef updated successfully');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(Chef $chef)
    {
        Storage::delete($chef->image);
        $chef->menus()->delete();
        $chef->delete();
        return redirect()->route('admin.chefs.index')->with('danger','Chef deleted successfully');
    }
}
