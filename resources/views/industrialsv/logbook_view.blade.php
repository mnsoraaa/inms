@extends('layouts.app')
  
  @extends('industrialsv.sidemenu')
  
  @section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home"></em>
            </a>
          </li>
          <li class="active">Logbook</li>
        </ol>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-lg-6">
          <h1 class="page-header">Logbook</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">

        <div class="col-sm-12">

          <form method="post" enctype="multipart/form-data" class="form-horizontal" action="">
            <fieldset>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-10">
                  <p>{{ Carbon\Carbon::parse($logbook->date)->format('d/M/Y') }}</p>
                </div>
              </div>

              <div class="form-group">
                <label for="objective" class="col-sm-2 control-label">Objective</label>
                <div class="col-sm-10">
                  <p>{{ $logbook->objective }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="tasks" class="col-sm-2 control-label">Tasks</label>
                <div class="col-sm-10">
                  <p>{{ $logbook->task }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="knowledge" class="col-sm-2 control-label">New Knowledges</label>
                <div class="col-sm-10">
                  <p>{{ $logbook->newknowledge }}</p>
                </div>
              </div>
			        <div class="form-group">
                <label for="attachment" class="col-sm-2 control-label">Attachment</label>
			          <div class="col-sm-10">
                  @if(isset($logbook->attachment))
                   <img src="{{ url('/img/attachments/logbooks/'.$logbook->attachment) }}"  width="150" height="129" alt="no image found">
                  @else
                   Not available
                  @endif
			          </div>
              </div>
            </fieldset>

            <div class="form-group" style="margin-top: 80px;">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="action-fixed-bottom animated bounceInUp">
                  <a href="{{ url('/industrialsv/logbook') }}" class="btn btn-warning"><i class="fa fa-angle-left"> </i> Back To list</a> </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    @endsection
