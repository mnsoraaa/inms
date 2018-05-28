@extends('layouts.app') @extends('coordinator.sidemenu') @section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <em class="fa fa-home"></em>
        </a>
      </li>
      <li class="active">Assign</li>
    </ol>
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Assign</h1>
    </div>
  </div>
  <!--/.row-->

  <div class="row">

    <div class="col-sm-12">

      <div class="panel panel-info" style="margin-bottom: 5%;">
        <div class="panel-heading">Assign Supervisor 
          <span class="pull-right">
            <a href="{{ url('/assign') }}">
              <button name="assign" value="assign" class="btn btn-success" type="submit"><i class="fa fa-assign"></i>Assign</button>
            </a>
          </span>
        </div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Supervisor</th>
                <th>Student ID</th>
                <th>Student's Name</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>

              @if(count($assigns)) 
                @foreach($assigns as $i => $assign)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $assign->facultysv->name }}</td>
                    <td>{{ $assign->student->matricID }}</td>
                    <td>{{ $assign->student->name }}</td>
                    <td>
                      <form action="{{ url('/assign/delete/'.$assign->id) }}" method="post">
                        {{ csrf_field() }}
                        <a href="{{ url('/coordinator/assign/edit/'.$assign->id) }}" class="btn btn-sm btn-warning"> <em class="fa fa-edit"></em> Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger" onsubmit="return confirm('Do you really want to delete?');"> <em class="fa fa-trash"></em> Delete</button>
                      </form>

                    </td>
                </tr>
                @endforeach
              @else
              <tr>
                <td colspan="5" style="text-align: center;">No data available.</td>
              </tr>
              @endif
            </tbody>
          </table>

        </div>
        <!--panelbody-->
      </div>
    </div>
  </div>

  @endsection
