@extends('layouts.app')
  
  @extends('jjim.sidemenu')
  
  @section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home"></em>
            </a>
          </li>
          <li class="active">Report Student LI List</li>
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
        <div class="col-lg-12">
          <h1 class="page-header">Report Student LI List</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-sm-12">
          <table id="report_std" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Matric ID</th>
                <th>Name</th>
                <th>Telephone No.</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              @if(count($students))
                @foreach($students as $i => $student)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->matricID }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->tel }}</td>
                    <td>{{ $student->email }}</td>
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
  
  @section('javascript')
  $('#report_std').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
  @endsection
