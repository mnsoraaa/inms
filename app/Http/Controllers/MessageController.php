<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Message;
use App\User;
use Carbon\Carbon;

class MessageController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$messages = Message::where('receiverID', Auth::user()->id)->groupBy('receiverID')->orderBy('id')->get();
    	return view(Auth::user()->roleName().'.message')
    		->with('messages', $messages);
    }

    public function message_add(){
        $users = User::all();
        return view(Auth::user()->roleName().'.message_add')
            ->with('users', $users);
    }

    public function message_view(Request $request){
        $getMessage = Message::find($request->id);
        $chat_info = Message::where('senderID', Auth::user()->id)
                            ->orWhere('receiverID', $getMessage->receiverID)
                            ->orWhere('senderID', $getMessage->senderID)
                            ->orWhere('receiverID', Auth::user()->id)
                            ->get();
       

        return view(Auth::user()->roleName().'.message_add')
            ->with('getMessage', $getMessage)
            ->with('chat_info', $chat_info)
            ->with('id', $request->id);
    }

    public function sendMessage(Request $request){
    	$message = new Message();
    	$message->senderID = Auth::user()->id;
    	$message->receiverID = $request->receiverID;
    	$message->message = $request->message;
    	$message->messageDateTime = Carbon::now();
        $message->save();
        return redirect(Auth::user()->roleName().'/message/view/'.$message->id);
    }
}
