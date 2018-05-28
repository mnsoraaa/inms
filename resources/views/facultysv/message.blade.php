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
          <li class="active">Message</li>
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
          <h1 class="page-header">Message</h1>
        </div>
        <div class="col-lg-6">
          <span class="container-fluid pull-right">
				<a href="{{ url('/student/message/add') }}" class="btn btn-success btn-sm page-header"> <em class="fa fa-plus"></em> New Message</a>
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
                <th>From</th>
                <th>Date</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @if(count($messages))
                @foreach($messages as $i => $message)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $message->sender->name }}</td>
                    <td>{{ Carbon\Carbon::parse($message->messageDateTime)->format('d/m/Y') }}</td>
                    <td>
                      <a href="{{ url('/facultysv/message/view/'.$message->id) }}" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</a> 
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
      </div>
    </div>
  @endsection
