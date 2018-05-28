@extends('layouts.app') @extends('coordinator.sidemenu') @section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Schedule</li>
    </ol>
  </div>
  <!--/.row-->

  <!-- message row -->
  <div class="row">
    <div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      <br /> @elseif($message = Session::get('error'))
      <div class="alert alert-error">
        <p>{{ $message }}</p>
      </div>
      <br /> @endif
    </div>
  </div>
  <!-- /message row -->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Schedule</h1>
    </div>
  </div>
  <!--/.row-->


  <div class="row">
    <div class="col-sm-12">

      <div class="panel panel-info">
        <div class="panel-heading">Add Schedule</div>
        <form action="{{ url('/schedule/add') }}" method="post">
          {{ csrf_field() }}
          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Date :</label>
              <div class="col-sm-10">
                <input type="date" name="date" class="form-control" required></input>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Location :</label>
              <div class="col-sm-10">
                <select name="location" class="form-control" id="list_name" required>
                  <option value="">Please select</option>
                  <option value="ZDK05">ZDK05</option>
                  <option value="ZDK06">ZDK06</option>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Supervisor Name :</label>
              <div class="col-sm-10">
                <select name="facultysv" class="form-control" id="list_name" required>
                  <option>Please select</option>
                  @foreach($facultysvs as $facultysv)
                  <option value="{{ $facultysv->id }}">{{ $facultysv->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-lg-12">
              <span class="container-fluid pull-right">
                  <button class="btn btn-success page-header" type="submit"><em class="fa fa-plus"></em> Add</button>
                </span>
            </div>
        </form>
        </div>
      </div>
    

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Date</th>
          <th>Supervisor Name</th>
          <th>Location</th>
          <th>Status</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        @if(count($schedules)) @foreach($schedules as $i => $schedule)
        <tr>
          <td>{{ Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
          <td>{{ $schedule->facultysv->name }}</td>
          <td>{{ $schedule->location }}</td>
          <td>@if($schedule->statusSchedule == 1){{ 'No confirmation' }}@else{{ 'Confirm' }}@endif</td>
          <form action="{{ url('/schedule/delete/'.$schedule->id) }}" method="post">
            <td>
              {{ csrf_field() }}
              <button type="submit" class="btn btn-sm btn-danger" onsubmit="return confirm('Do you really want to delete?');"> <em class="fa fa-trash"></em> Delete</button>
            </td>
          </form>
        </tr>
        @endforeach @else
        <tr>
          <td colspan="5" style="text-align: center;">No data available.</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
  @endsection
