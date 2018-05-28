<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Assign;

class AssignController extends Controller
{
    //


    public function assign(){
        //baca data assigns dari database
        $assigns = Assign::orderBy('facultySVID')->get();
        return view('coordinator.assign')
            ->with('assigns', $assigns);
    }

    public function assign_edit(Request $request){
        $assign = Assign::find($request->id);
        $facultysvs =  User::where('position', 3)->get();

        return view('coordinator.assign_edit')
            ->with('assign', $assign)
            ->with('facultysvs', $facultysvs);
    }

    public function edit(Request $request){
        $assign = Assign::find($request->id);
        $assign->facultySVID = $request->facultySVID;
        $assign->save();

        return redirect('/coordinator/assign')
            ->with('success', 'Succesfully updated assign faculty supervisor!');
    }

    public function noStd(){
    	$count = 0;

    	$student = User::where('position', 5);
    	$facultysv = User::where('position', 3);

    	$noStd = $student->count();

    	$getStudents = $student->get()->toArray();
    	$getFacultysv = $facultysv->get()->toArray();

    	for ($i=0; $i < $noStd; $i++) { 
    		$assign = Assign::where('studentID', $getStudents[$i]['id'])->first();
            if(empty($assign)){
                $assign = new Assign();
            }
    		if(empty($getFacultysv[$i]['id'])){
    			if($getFacultysv[$count]['id'] == null){
    				$count = 0;
    			}
    			$assign->studentID = $getStudents[$i]['id'];
    			$assign->facultySVID = $getFacultysv[$count]['id'];
    			$count += 1;
    		}else{
    			$assign->studentID = $getStudents[$i]['id'];
    			$assign->facultySVID = $getFacultysv[$i]['id'];
    		}
    		$assign->save();
    	}

    	$assigns = Assign::all();

    	return view('coordinator.assign')
            ->with('assigns', $assigns);
    }
}
