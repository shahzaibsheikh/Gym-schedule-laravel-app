<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledClass;
class BookingController extends Controller
{
    public function create(){
        $scheduledClasses = ScheduledClass::UpComing()
        ->with('classType','instructor')
        ->NotBooked()
        ->oldest('date_time')->get();
        return view('member.book')->with('scheduledClasses',$scheduledClasses);
    }

    public function store(Request $request){
        
        auth()->user()->booking()->attach($request->scheduled_class_sc_id);

        return redirect()->route('booking.index');
    }

    public function index(){
        $bookings = auth()->user()->booking()->where('date_time','>',now())->get();
        
        return view('member.upcoming')->with('bookings',$bookings);
        }

        public function destroy($id){
         auth()->user()->booking()->detach($id);
         return redirect()->route('booking.index');

        }
}
