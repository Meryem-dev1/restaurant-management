<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

      /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users=User::paginate(4);
       return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('admin.users.create');

    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('admin.users.index')->with('success','User created successfully');

    }

    /**
     * Display the resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(UserRequest $request,User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success','User updated successfully');

    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('danger','User deleted successfully');
    }
}
