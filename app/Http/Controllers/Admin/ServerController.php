<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server;
use App\Http\Requests\RequestServer;

class ServerController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $servers=Server::paginate(4);
       return view('admin.servers.index',compact('servers'));
    }

    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('admin.servers.create');

    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(RequestServer $request)
    {
        $server=Server::create([
            'name'=>$request->name,
            'adress'=>$request->adress,
            'tel_number'=>$request->tel_number,
        ]);

        return redirect()->route('admin.servers.index')->with('success','Server created successfully');
    }

    /**
     * Display the resource.
     */
    public function show(Server $server)
    {
        return view('admin.servers.show',compact('server'));
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Server $server)
    {
        return view('admin.servers.edit',compact('server'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(RequestServer $request,Server $server)
    {
        $server->update($request->all());
        return redirect()->route('admin.servers.index')->with('success','Server updated successfully');

    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(Server $server)
    {
        $server->delete();
        return redirect()->route('admin.servers.index')->with('danger','Server deleted successfully');
    }
}
