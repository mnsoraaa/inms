<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image; 
use App\User;
use App\Assign;

class ProfileController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(){
    	$userinfo = User::find(Auth::user()->id);
    	return view(Auth::user()->roleName().'.profile')
    		->with('userinfo', $userinfo);
    }

    public function profile_edit(){
        $userinfo = User::find(Auth::user()->id);
        return view(Auth::user()->roleName().'.profile_edit')
            ->with('userinfo', $userinfo);
    }

    public function add(Request $request){//student nak register untuk industrial sv
        $userinfo = new User();
        $userinfo->name = $request->name;
        $userinfo->address = $request->address;
        $userinfo->tel = $request->tel;
        $userinfo->email = $request->email;
        $userinfo->position = 4;//hardcode industrial supervisor role
        $userinfo->password = bcrypt($request->email);        
        $userinfo->save();

        //terus assign jadi industrial sv budak tu
        $assign = Assign::where('studentID', Auth::user()->id)->first();
        if(empty($assign)){
            $assign = new Assign();
        }
        $assign->studentID = Auth::user()->id;
        $assign->industrialSVID = $userinfo->id;
        $assign->save();

        return redirect('/student/register')
            ->with('success', 'Succesfully create account and assign as your industrial supervisor!');
    }

    public function edit(Request $request){
    	$userinfo = User::find(Auth::user()->id);

        $userinfo->name = $request->name;
        $userinfo->address = $request->address;
        $userinfo->tel = $request->tel;
        $userinfo->email = $request->email;
        $userinfo->position = Auth::user()->userPosition();
        if(Auth::user()->isIndustrialSV()){
            $userinfo->companyName = $request->companyName;
            $userinfo->companyAdd = $request->companyAdd;
            $userinfo->companyTel = $request->companyTel;
        }
        if($request->has('matricID') && $request->matricID != ""){
            $userinfo->matricID = $request->matricID;
        }
        if($request->has('password') && $request->password != ""){
            $userinfo->password = bcrypt($request->password);
        }
        if ($request->has('image')) {

            $image = $request->image;
            $filename  = time();

            $userinfo->image = $filename.".jpg";

            $path = public_path('img/attachments/profiles/'.$filename.".jpg");
            $image = Image::make($image->getRealPath());
            $original = $image->save($path);

        }

        $userinfo->save();

        return redirect('/profile')
            ->with('success', 'Succesfully update your profile!')
            ->with('userinfo', $userinfo);
    }

    public function register_supervisor(){
        return view('student.profile_add');
    }


}
