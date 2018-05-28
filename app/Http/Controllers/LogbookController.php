<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Image; 
use Carbon\Carbon;
use App\Logbook;
use App\Assign;

class LogbookController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
         $assigns = null;

    	if(Auth::user()->isStudent()){
    		$logbooks = Logbook::where('studentID', Auth::user()->id)->orderByDesc('date')->get();
    	}
		if(Auth::user()->isFacultySV()){
            $assigns = Assign::where('facultySVID', Auth::user()->id)->get();
    		$logbooks = Logbook::where('studentID', Auth::user()->id)->orderByDesc('date')->get();
    	}
        if(Auth::user()->isIndustrialSV()){
            $assigns = Assign::where('industrialSVID', Auth::user()->id)->get();
            $logbooks = Logbook::where('studentID', Auth::user()->id)->orderByDesc('date')->get();
        }
    	return view(Auth::user()->roleName().'.logbook')
    		->with('logbooks', $logbooks)
            ->with('assigns', $assigns);
			
    }

    public function view(Request $request){
        $logbook = Logbook::find($request->id);
        return view(Auth::user()->roleName().'.logbook_view')
            ->with('logbook', $logbook);
    }

    public function logbook_student(Request $request){
        if(Auth::user()->isFacultySV()){
            $assigns = Assign::where('facultySVID', Auth::user()->id)->get();
            $logbooks = Logbook::where('studentID', $request->id)->get();
        }
        if(Auth::user()->isIndustrialSV()){
            $assigns = Assign::where('industrialSVID', Auth::user()->id)->get();
            $logbooks = Logbook::where('studentID', $request->id)->get();
        }
        return view(Auth::user()->roleName().'.logbook')
            ->with('logbooks', $logbooks)
            ->with('assigns', $assigns);
    }

    public function logbook_add(){
        return view('student.logbook_add');
    }

    public function logbook_edit(Request $request){
        $logbook = Logbook::find($request->id);
        return view('student.logbook_add')
            ->with('logbook', $logbook);
    }

    public function add(Request $request){

    	//validation
        $request->validate([
            'date' => 'required',
            'objective' => 'required|max:190',
            'task' => 'required|max:190',
            'newknowledge' => 'required|max:190'
        ]);

    	$logbook = new Logbook();
    	$logbook->studentID = Auth::user()->id;
    	$logbook->date = Carbon::createFromFormat('m/d/Y', $request->date);
    	$logbook->objective = $request->objective;
    	$logbook->task = $request->task;
    	$logbook->newknowledge = $request->newknowledge;

    	if ($request->has('attachment')) {

            $image = $request->attachment;
            $filename  = time();

            $logbook->attachment = $filename.".jpg";

            $path = public_path('img/attachments/logbooks/'.$filename.".jpg");
            $image = Image::make($image->getRealPath());
            $original = $image->save($path);

        }

    	$logbook->publish = $request->publish;

    	$logbook->save();

    	return redirect('/student/logbook')
    		->with('success', 'Successfully create logbook!');

    }

    public function edit(Request $request){

    	//validation
        $request->validate([
            'date' => 'required',
            'objective' => 'required|max:190',
            'task' => 'required|max:190',
            'newknowledge' => 'required|max:190'
        ]);
        
    	$logbook = Logbook::find($request->id);
    	$logbook->studentID = Auth::user()->id;
    	$logbook->objective = $request->objective;
    	$logbook->task = $request->task;
    	$logbook->newknowledge = $request->newknowledge;
    	
    	if ($request->has('attachment')) {

            // remove old image
            File::delete(public_path('img/attachments/logbooks/'.$logbook->attachment));

            $image = $request->attachment;
            $filename  = time();

            $logbook->attachment = $filename.".jpg";

            $path = public_path('img/attachments/logbooks/'.$filename.".jpg");
            $image = Image::make($image->getRealPath());
            $original = $image->save($path);

        }

    	$logbook->publish = $request->publish;

    	$logbook->save();

    	return redirect('/student/logbook')
    		->with('success', 'Successfully create logbook!');

    }

    public function delete(Request $request){

    	$logbook = Logbook::find($request->id);
    	$logbook->delete();

    	return redirect('/student/logbook')
    		->with('success', 'Successfully delete logbook!');
    }
}
