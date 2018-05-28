<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Assign;
use App\Schedule;
class ReportController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function ReportStd_index(){
    	$students = User::where('position', 5)->get();
    	return view('jjim.report_std')
    		->with('students', $students);
    }

    public function ReportSV_index(){
    	$facultysvs = User::where('position', 3)->get();
    	return view('jjim.report_facultysv')
    		->with('facultysvs', $facultysvs);
    }

    public function ReportReleaseLetter_index(){
        $assigns = Assign::where('studentID', Auth::user()->id)->first();
        $schedules = Schedule::where(['facultySVID' => $assigns->facultySVID, 'statusSchedule' => 0])->first();
        return view('student.report_release_letter')
            ->with('schedules',$schedules);
    }
}
