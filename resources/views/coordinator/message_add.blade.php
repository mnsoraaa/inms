@extends('layouts.app')
  
  @extends('coordinator.sidemenu')
  
  @section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home"></em>
            </a>
          </li>
          <li class="active">Messages</li>
        </ol>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-lg-6">
          <h1 class="page-header">Private Messages</h1>
        </div>
        <div class="col-lg-6">
          <span class="container-fluid pull-right">
        
      </span>
        </div>
      </div>
      <!--/.row-->

      <div class="row">

        <div class="col-sm-12">   
          <div class="panel panel-default chat">
              @if(isset($chat_info))
                <div class="panel-heading">Chat with :
                <strong>@if($getMessage->receiverID == Auth::user()->id){{ $getMessage->sender->name }}@else{{ $getMessage->receiver->name }}@endif</strong>
                <input type="hidden" name="receiverID" value="@if($getMessage->receiverID == Auth::user()->id){{ $getMessage->senderID }}@else{{ $getMessage->receiverID }}@endif" form="form_message">
                <input type="hidden" name="messageID" value="{{ $id }}" form="form_message">
              @else
              <div class="panel-heading">Chat send to:
                <div class="container-fluid pull-right">
                  <select class="form-control" form="form_message" name="receiverID">
                    <option value="">Please select user</option>
                    @if(count($users))
                      @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
              @endif
            </div>
            <div class="panel-body" style="height: 550px;" id="message_info">
              <ul>
                @if(isset($chat_info))
                @foreach($chat_info as $chat)
                  @if($chat->receiverID == Auth::user()->id)
                    <li class="left clearfix"><span class="chat-img pull-left">
                      <img src="{{ url('/img/sender.png') }}" alt="User Avatar" class="img-circle">
                      </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <strong class="primary-font">{{ $chat->sender->name }}</strong>
                          <small class="text-muted">{{ Carbon\Carbon::parse($chat->messageDateTime)->format('d-m-Y H:i:s')}}</small>
                        </div>
                        <p>{{ $chat->message }}</p>
                      </div>
                    </li>
                  @else
                    <li class="right clearfix"><span class="chat-img pull-right">
                      <img src="{{ url('/img/receiver.png') }}" alt="User Avatar" class="img-circle">
                      </span>
                      <div class="chat-body clearfix">
                        <div class="header">
                          <strong class="primary-font">{{ $chat->sender->name }}</strong>
                          <small class="text-muted">{{ Carbon\Carbon::parse($chat->messageDateTime)->format('d-m-Y H:i:s')}}</small>
                        </div>
                        <p>{{ $chat->message }}</p>
                      </div>
                    </li>
                  @endif
                @endforeach
                @endif
              </ul>
            </div>
            <form action="{{ url('/message/send') }}" method="post" id="form_message">
              <div class="panel-footer">
                <div class="input-group">
                    {{ csrf_field() }}
                      <input id="btn-input" name="message" type="text" class="form-control" placeholder="Type your message here...">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-md" id="btn-chat">Send</button>
                      </span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endsection

    @if(isset($chat_info))
      @section('javascript')
        var elem = document.getElementById('message_info');
        elem.scrollTop = elem.scrollHeight;
        setTimeout(function(){
          location = ''
        },20000)
      @endsection
    @endif