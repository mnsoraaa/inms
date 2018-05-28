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
          <h1 class="page-header">Assign Industrial Supervisor</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">

        <div class="col-sm-12">

          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @if(count($industrialsvs))
                @foreach($industrialsvs as $i => $industrialsv)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $industrialsv->name }}</td>
                    <td>{{ $industrialsv->email }}</td>
                    <td>{{ $industrialsv->tel }}</td>
                    <td>
                      @if(!empty($assisgnsv) && $assisgnsv->industrialSVID == $industrialsv->id)
                        {{ 'This is your industrial supervisor' }}
                      @else
                      <form action="{{ url('/assign/add/industrialsv') }}" method="post" onsubmit="return confirm('Confirm assign this person as your industrial supervisor?');">
                        {{ csrf_field() }}
                        <input type="hidden" name="industrialsv" value="{{ $industrialsv->id }}">
                        <button type="submit" class="btn btn-sm btn-danger" > <em class="fa fa-trash"></em> Assign</button>
                      </form>
                      @endif
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
