<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Image; 
use App\Announcement;
use App\Faq;
use Carbon\Carbon;


class GeneralController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    /////////////////////
    ///// DASHBOARD /////
    /////////////////////
    public function index(){

        $announcements = Announcement::where('publish', 0)->orderByDesc("id")->take(5)->get();
        $faqs = Faq::where('publish', 0)->get();
        return view(Auth::user()->roleName().'.index')
            ->with('announcements', $announcements)
            ->with('faqs', $faqs);
    }
    //END DASHBOARD
    
    /////////////////////
    /// ANNOUNCEMENT ////
    /////////////////////
    public function announcements(){
        //baca data announcements dari database
        $announcements = Announcement::orderByDesc("id")->get();
        return view('coordinator.announcements')
            ->with('announcements', $announcements);
    }

    public function add_announcements(){
        return view('coordinator.announcements_add');
    }

    public function edit_announcements(Request $request){

        $announcements = Announcement::find($request->id);

        return view('coordinator.announcements_add')
            ->with('announcements', $announcements);
    }

    public function show_announcements(Request $request){
        $announcements = Announcement::find($request->id);

        return view('coordinator.announcements_show')
            ->with('announcements', $announcements);
    }

    public function announcements_add(Request $request){

        //validation
        $request->validate([
            'title' => 'required|max:190',
            'description' => 'required|max:190',
            'publish' => 'required'
        ]);

        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->publish = $request->publish;
        $announcement->date = Carbon::now();
        
        if ($request->has('attachment')) {

            $image = $request->attachment;
            $filename  = time();

            $announcement->attachment = $filename.".jpg";

            $path = public_path('img/attachments/announcements/'.$filename.".jpg");
            $image = Image::make($image->getRealPath());
            $original = $image->save($path);

        }

        $announcement->save();                    

    	return redirect('/coordinator/announcement')->with('success', "Announcement Successfully created!");
    }


    public function announcements_edit(Request $request){

        //validation
        $request->validate([
            'title' => 'required|max:190',
            'description' => 'required|max:190',
            'publish' => 'required'
        ]);

        $announcement = Announcement::find($request->id);
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->publish = $request->publish;
        
        if ($request->has('attachment')) {


            // remove old image
            File::delete(public_path('img/attachments/announcements/'.$announcement->attachment));

            $image = $request->attachment;
            $filename  = time();

            $announcement->attachment = $filename.".jpg";

            $path = public_path('img/attachments/announcements/'.$filename.".jpg");
            $image = Image::make($image->getRealPath());
            $original = $image->save($path);

        }

        $announcement->save();                    

        return redirect('/coordinator/announcement')->with('success', "Announcement Successfully updated!");
    }

    public function announcements_delete(Request $request){

        $announcement = Announcement::find($request->id);
        $announcement->delete();

        return redirect('/coordinator/announcement')->with('success', "Announcement Successfully deleted!");
    }
    //END ANNOUNCEMENT


    /////////////
    /// FAQ  ////
    /////////////
    public function faqs(){
        //baca data faqs dari database
        $faqs = Faq::orderByDesc("id")->get();
        return view('coordinator.faqs')
            ->with('faqs', $faqs);
    }

    public function add_faqs(){
        return view('coordinator.faqs_add');
    }

    public function edit_faqs(Request $request){

        $faqs = Faq::find($request->id);

        return view('coordinator.faqs_add')
            ->with('faqs', $faqs);
    }

    public function show_faqs(Request $request){
        $faqs = Faq::find($request->id);

        return view('coordinator.faqs_show')
            ->with('faqs', $faqs);
    }

    public function faqs_add(Request $request){

        //validation
        $request->validate([
            'question' => 'required|max:190',
            'answer' => 'required|max:190',
            'publish' => 'required'
        ]);

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->publish = $request->publish;
        
        if ($request->has('attachment')) {

            $image = $request->attachment;
            $filename  = time();

            $faq->attachment = $filename.".jpg";

            $path = public_path('img/attachments/faqs/'.$filename.".jpg");
            $image = Image::make($image->getRealPath());
            $original = $image->save($path);

        }

        $faq->save();                    

        return redirect('/coordinator/faq')->with('success', "Faq Successfully created!");
    }


    public function faqs_edit(Request $request){

        //validation
        $request->validate([
            'question' => 'required|max:190',
            'answer' => 'required|max:190',
            'publish' => 'required'
        ]);

        $faq = Faq::find($request->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->publish = $request->publish;
        
        if ($request->has('attachment')) {

            // remove old image
            File::delete(public_path('img/attachments/faqs/'.$faq->attachment));

            $image = $request->attachment;
            $filename  = time();

            $faq->attachment = $filename.".jpg";

            $path = public_path('img/attachments/faqs/'.$filename.".jpg");
            $image = Image::make($image->getRealPath());
            $original = $image->save($path);

        }

        $faq->save();                    

        return redirect('/coordinator/faq')->with('success', "Faq Successfully updated!");
    }

    public function faqs_delete(Request $request){

        $faq = Faq::find($request->id);
        $faq->delete();

        return redirect('/coordinator/faq')->with('success', "Faq Successfully deleted!");
    }
    //END FAQ
}
