<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Schedule;
use App\User;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$facultysvs = User::where('position', 3)->get();
    	$schedules = Schedule::all();
    	return view('coordinator.schedule')
    		->with('facultysvs', $facultysvs)
    		->with('schedules', $schedules);
    }

    public function confirmation_view(){
        $schedule = Schedule::where('facultySVID', Auth::user()->id)->first();
        return view(Auth::user()->roleName().'.schedule_confirm')
            ->with('schedule', $schedule);
    }

    public function add(Request $request){

        $check_exist = Schedule::where('facultySVID', $request->facultysv)->first();
        if(!empty($check_exist)){
            return redirect(Auth::user()->roleName().'/schedule/')
                ->with('error', 'This user has been added before!');
        }

    	$schedules = new Schedule;
    	$schedules->facultySVID = $request->facultysv;
    	$schedules->date = $request->date;
    	$schedules->location = $request->location;
    	$schedules->save();
    	return redirect(Auth::user()->roleName().'/schedule/')
    		->with('success', 'Successfully add schedule!');
    }

    public function edit(Request $request){
    	$schedules = Schedule::find($request->id);
    	$schedules->facultySVID = $request->facultysv;
    	$schedules->date = $request->date;
    	$schedules->location = $request->location;
    	$schedules->save();
    	return redirect(Auth::user()->roleName().'/schedule/')
    		->with('success', 'Successfully update schedule!');
    }

    public function delete(Request $request){
    	$schedules = Schedule::find($request->id);
    	$schedules->delete();
    	return redirect(Auth::user()->roleName().'/schedule/')
    		->with('success', 'Successfully deleted schedule!');
    }

    public function confirmation(Request $request){
    	$schedules = Schedule::find($request->id);
    	$schedules->statusSchedule = 0;
    	$schedules->save();
    	return redirect(Auth::user()->roleName().'/schedule/confirm/')
    		->with('success', 'Successfully confirm schedule!');
    }
}
