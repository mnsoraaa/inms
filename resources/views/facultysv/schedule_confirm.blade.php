@extends('layouts.app')
  
  @extends('facultysv.sidemenu')
  
  @section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home"></em>
            </a>
          </li>
          <li class="active">Schedules</li>
        </ol>
      </div>
      <!--/.row-->

      <!-- message row -->
      <div class="row">
        <div class="container">
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div><br />
          @endif
        </div>
      </div>
      <!-- /message row -->

      <div class="row">
        <div class="col-lg-6">
          <h1 class="page-header">Schedules</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-sm-12">
          @if(count($schedule))
          <fieldset>
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">Date</label>
              <div class="col-sm-10">
                  <label for="title" class="col-sm-2 control-label">{{ Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</label>
              </div>
            </div>
            <div class="form-group">
              <label for="objective" class="col-sm-2 control-label">Supervisor Name</label>
              <div class="col-sm-10">
                <label for="title" class="col-sm-2 control-label">{{ $schedule->facultysv->name }}</label>
              </div>
            </div>
            <div class="form-group">
              <label for="tasks" class="col-sm-2 control-label">Location</label>
              <div class="col-sm-10">
                <label for="title" class="col-sm-2 control-label">{{ $schedule->location }}</label>
              </div>
            </div>			  
          </fieldset>
          <div class="form-group" style="margin-top: 80px;">
            <div class="col-sm-offset-2 col-sm-10">
              @if($schedule->statusSchedule == 1)
              <form method="post" class="form-horizontal" action="{{ url('/schedule/confirm/'.$schedule->id) }}" onsubmit="return confirm('Once agree cannot be edit. Proceed?');">
                {{ csrf_field() }}
                <div class="action-fixed-bottom animated bounceInUp">
                  <button class="btn btn-success" type="submit" ><i class="fa fa-check"></i> Agree</button>
                  <a href="#" class="btn btn-danger"><i class="fa fa-close"> </i> Not Agree</a>
                </div>
              </form>
              @else
              <div class="action-fixed-bottom animated bounceInUp">
                <p>This schedule has been confirm.</p>
              </div>
              @endif
            </div>
          </div>
          @else
          <h1>No data available.</h1>
          @endif
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.main-->
@endsection
