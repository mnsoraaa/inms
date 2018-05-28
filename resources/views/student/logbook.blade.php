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
          <h1 class="page-header">Logbook</h1>
        </div>
        <div class="col-lg-6">
          <span class="container-fluid pull-right">
    				<a href="{{ url('/student/logbook/add') }}" class="btn btn-success btn-sm page-header"> <em class="fa fa-plus"></em> Add New</a>
    			</span>
        </div>
      </div>
      <!--/.row-->

      <div class="row">

        <div class="col-sm-12">


          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Day</th>
                <th>Date</th>
                <th>Objective</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @if(count($logbooks))
                @foreach($logbooks as $i => $logbook)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ Carbon\Carbon::parse($logbook->date)->format('l') }}</td>
                    <td>{{ Carbon\Carbon::parse($logbook->date)->format('d/m/Y') }}</td>
                    <td>{{ $logbook->objective }}</td>
                    <td>
                      <form action="{{ url('/logbook/delete/'.$logbook->id) }}" method="post" onsubmit="return confirm('Do you really want to delete?');">
                        {{ csrf_field() }}
                        <a href="{{ url('/student/logbook/view/'.$logbook->id) }}" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</a>
                        <a href="{{ url('/student/logbook/edit/'.$logbook->id) }}" class="btn btn-sm btn-warning"> <em class="fa fa-edit"></em> Edit</a>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-sm btn-danger" > <em class="fa fa-trash"></em> Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="5">No data available.</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endsection
