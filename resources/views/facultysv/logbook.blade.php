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
          <li class="active">Logbook</li>
        </ol>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Logbook</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">Student Information</div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Name :</label>              
                <div class="col-sm-10">
                  <select name="list_name" class="form-control" id="list_name" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option>Please select</option>
                    @foreach($assigns as $assign)
                      <option value="{{ url('/'.Auth::user()->roleName().'/logbook/student/'.$assign->studentID) }}"> {{ $assign->student->name }} - {{ $assign->student->matricID }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
           </div>


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
                      <form>
                        <a href="{{ url('/facultysv/logbook/view/'.$logbook->id) }}" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</a>
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
      <!--/.row-->


    </div>
    <!--/.main-->
  @endsection
  