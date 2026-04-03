<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Requests\TableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables=Table::paginate(4);
        return view('admin.tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        Table::create([
            'name'=>$request->name,
            'guest_number'=>$request->guest_number,
            'status'=>$request->status,
            'location'=>$request->location
        ]);
        return redirect()->route('admin.tables.index')->with('success','Table created successfuly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return  view('admin.tables.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, Table $table)
    {
        $table->update($request->validated());
        return redirect()->route('admin.tables.index')->with('success','Table updated successfuly.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->reservations()->delete();
        $table->delete();
        return redirect()->route('admin.tables.index')->with('danger','Table updated successfuly.');
    }
}
