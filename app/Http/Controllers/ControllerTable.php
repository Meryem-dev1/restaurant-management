<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class ControllerTable extends Controller
{
   public function edit(Table $table){
    return view("tables.edit")->with([
        "table" => $table
    ]);
   }

   public function update(Request $request,Table $table){
    $this->validate($request, [
        "status" => "required"
    ]);

    $table->update([
        "status" => $request->status,
    ]);
    //redirect user
    return redirect()->route("payments.index")->with([
        "success" => "table modifiée avec succés"
    ]);
   }
}
