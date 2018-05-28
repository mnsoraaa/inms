@extends('layouts.app')
  
  @extends('student.sidemenu')
  
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

      <!-- message row -->
      <div class="row">
        <div class="container">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div><br />
          @endif
        </div>
      </div>
      <!-- /message row -->

      <div class="row">
        <div class="col-lg-6">
          <h1 class="page-header">Logbook</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">

        <div class="col-sm-12">

          <form method="post" enctype="multipart/form-data" class="form-horizontal" action="@if(isset($logbook->id)){{ url('/logbook/edit/'.$logbook->id) }}@else{{ url('/logbook/add') }}@endif">
            {{ csrf_field() }}
            <fieldset>

              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-10">
                  <div class="input text required">
                    <input name="date" id="datepicker" name="datepicker" class="form-control" required="required" value="@if(isset($logbook->date)){{date('m/d/Y',strtotime($logbook->date))}}@endif" @if(isset($logbook->id)){{ 'readonly' }}@endif>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="objective" class="col-sm-2 control-label">Objective</label>
                <div class="col-sm-10">
                  <div class="input textarea required">
                    <textarea name="objective" class="form-control" id="objective" required="required" rows="5">@if(isset($logbook->objective)){{ $logbook->objective }}@endif</textarea>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="tasks" class="col-sm-2 control-label">Tasks</label>
                <div class="col-sm-10">
                  <div class="input textarea required">
                    <textarea name="task" class="form-control" id="task" required="required" rows="5">@if(isset($logbook->task)){{ $logbook->task }}@endif</textarea>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="newknowledge" class="col-sm-2 control-label">New Knowledges</label>
                <div class="col-sm-10">
                  <div class="input textarea required">
                    <textarea name="newknowledge" class="form-control" id="newknowledge" required="required" rows="5">@if(isset($logbook->newknowledge)){{ $logbook->newknowledge }}@endif</textarea>
                  </div>
                </div>
              </div>
            
			        <div class="form-group">
                <label for="attachment" class="col-sm-2 control-label">Attachment</label>
                <div class="col-sm-10">
                  <input type="file" name="attachment" class="form-control" id="attachment">
                </div>
              </div>

              <div class="form-group">
                <label for="is_publish" class="col-sm-2 control-label">Publish</label>
                <div class="col-sm-10">
                  <select name="publish" class="form-control" id="is_publish">
                    <option value="0" @if(isset($logbook->publish) && $logbook->publish == "0"){{ 'selected' }}@endif>Yes</option>
                    <option value="1" @if(isset($logbook->publish) && $logbook->publish == "1"){{ 'selected' }}@endif>No</option>
                  </select>
                </div>
              </div>
            </fieldset>

            <div class="form-group" style="margin-top: 80px;">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="action-fixed-bottom animated bounceInUp">
                  <button name="save" value="save" class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
                  <a href="{{ url('/student/logbook') }}" class="btn btn-warning"><i class="fa fa-angle-left"> </i> Back To list</a> </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  @endsection

@section('javascript')
$("#datepicker").datepicker();
@endsection