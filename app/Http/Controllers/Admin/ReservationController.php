<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use App\Enums\TableStatus;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations=Reservation::paginate(4);
        return view('admin.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables=Table::where('status',TableStatus::Avaliable)->get();
        return view('admin.reservations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        $table=Table::findOrFail($request ->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning','Please choose the table base on guests.');
        }

        /**$request_date=Carbon::parse($request->res_date);
        foreach($table->reservations as $res){
            if($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning','This table is reserved for this date.');
            }
        }**/

        Reservation::create($request->validated());
        return redirect()->route('admin.reservations.index')->with('success','Reservation created successfuly.');
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
    public function edit(Reservation $reservation)
    {
        $tables=Table::where('status',TableStatus::Avaliable)->get();
        return view('admin.reservations.edit',compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        // $reservation->update([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'tel_number'=>$request->tel_number,
        //     'res_date'=>$request->res_date,
        //     'res_time'=>$request->res_time,
        //     'guest_number'=>$request->guest_number,
        //     'table_id'=>$request->table_id
        // ]);
        $reservation->update($request->post());

        return redirect()->route('admin.reservations.index')->with('success','Reservation updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('danger','Reservation deleted successfuly.');
    }
}
