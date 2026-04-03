<?php 
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use App\Enums\TableStatus; 
use App\Models\Table; 
class ReservationController extends Controller 
{ 
    public function index(Request $request) 
    { 
        $reservation = $request->session()->get('reservation'); 
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();

        // $res_table_ids = Reservation::orderBy('res_date')->get()->filter(function($value) use ($reservation) { 
        //     return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d'); })
        //     ->pluck('table_id'); 

        $tables = Table::where('status', TableStatus::Avaliable)->get();
            // ->where('guest_number', '>=', $reservation->guest_number) 
            // ->whereNotIn('id',$res_table_ids)
            
 
            
            return view('reservation', compact('reservation','tables','min_date','max_date')); 
    } 

    public function store(Request $request)
    {
        $validated=$request->validate([ 
            'name'=>'required', 
            'email'=>'required|email', 
            'tel_number'=>'required', 
            'res_date'=>['required' , 'date' , new DateBetween], 
            'res_time'=>['required' ,new TimeBetween], 
            'guest_number'=>'required|integer|min:1', 
            'table_id'=>'required' 
        ]); 
        
       

        $reservation = new Reservation(); 
        $reservation->fill($validated); 
        
        $table = Table::findOrFail($validated['table_id']);
        if ($validated['guest_number'] > $table->guest_number) {
            return back()->with('warning', 'Please choose a table based on the number of guests.');
        }
        $reservation->save(); 
        $request->session()->forget('reservation'); 

        return redirect()->route('reservation')->with('success','Your reservation is ready'); 
    } 
} 