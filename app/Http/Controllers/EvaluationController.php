<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Assign;
use App\Evaluation;

class EvaluationController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(Request $request){
        $evaluation = null;
        $student = null;

    	if(Auth::user()->isFacultySV()){
    		$student_lists = Assign::where('facultySVID', Auth::user()->id)->get();
    	}else{
    		$student_lists = Assign::where('industrialSVID', Auth::user()->id)->get();
    	}

        if(!empty($request->id)){
            $evaluation = Evaluation::where('studentID', $request->id)->first();
            $student = User::find($request->id);
        }

    	return view(Auth::user()->roleName().'.evaluation')
    			->with('student_lists', $student_lists)
                ->with('evaluation', $evaluation)
                ->with('student', $student);
    }

    public function evaluation_logbook_edit(Request $request){
    	$evaluation = Evaluation::where('studentID', $request->id)->first();
    	$student = User::find($request->id);

    	return view(Auth::user()->roleName().'.evaluation_logbook')
    			->with('evaluation', $evaluation)
    			->with('student', $student);
    }

    public function evaluation_presentation_edit(Request $request){
    	$evaluation = Evaluation::where('studentID', $request->id)->first();
    	$student = User::find($request->id);

    	return view(Auth::user()->roleName().'.evaluation_presentation')
    			->with('evaluation', $evaluation)
    			->with('student', $student);
    }

    public function evaluation_internship_edit(Request $request){
    	$evaluation = Evaluation::where('studentID', $request->id)->first();
    	$student = User::find($request->id);

    	return view(Auth::user()->roleName().'.evaluation_internship')
    			->with('evaluation', $evaluation)
    			->with('student', $student);
    }

    public function evaluation_logbook_add(Request $request){
        $evaluation = Evaluation::where('studentID', $request->studentID)->first();
        if(empty($evaluation)){
            $evaluation = new Evaluation();
        }
        $evaluation->studentID = $request->studentID;
        $evaluation->markLogbook = $request->markLogbook;
        $evaluation->remarksLogbook = $request->remarksLogbook;
        $evaluation->save();
        return redirect(Auth::user()->roleName().'/evaluation/'.$request->studentID);
    }

    public function evaluation_presentation_add(Request $request){
        $evaluation = Evaluation::where('studentID', $request->studentID)->first();
        if(empty($evaluation)){
            $evaluation = new Evaluation();
        }
        $evaluation->studentID = $request->studentID;
        $evaluation->markPresent = $request->markPresent;
        $evaluation->remarksPresent = $request->remarksPresent;
        $evaluation->save();
        return redirect(Auth::user()->roleName().'/evaluation/'.$request->studentID);
    }

    public function evaluation_internship_add(Request $request){
        $evaluation = Evaluation::where('studentID', $request->studentID)->first();
        if(empty($evaluation)){
            $evaluation = new Evaluation();
        }
        $evaluation->studentID = $request->studentID;
        $evaluation->markInternship = $request->markInternship;
        $evaluation->remarksInternship = $request->remarksInternship;
        $evaluation->save();
        return redirect(Auth::user()->roleName().'/evaluation/'.$request->studentID);
    }
}
