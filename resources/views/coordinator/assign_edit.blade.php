@extends('layouts.app')
  
  @extends('coordinator.sidemenu')
  
  @section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li>
            <a href="#">
              <em class="fa fa-home"></em>
            </a>
          </li>
          <li class="active">Assign Faculty Supervisor</li>
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
          <h1 class="page-header">Edit Assign Faculty Supervisor</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-sm-12">
          @if(count($assign))
          <form method="post" class="form-horizontal" action="{{ url('/assign/edit/'.$assign->id) }}" >
            <fieldset>
              <div class="form-group">
                <label for="objective" class="col-sm-2 control-label">Student Name</label>
                <div class="col-sm-10">
                  <label for="title" class="col-sm-2 control-label">{{ $assign->student->name }}</label>
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Faculty Supervisor</label>
                <div class="col-sm-10">
                    <select name="facultySVID" id="facultySVID" class="form-control">
                      <option>Please select</option>
                      @foreach($facultysvs as $facultysv)
                        <option @if($facultysv->id == $assign->facultySVID){{'selected'}}@endif value="{{ $facultysv->id }}">{{ $facultysv->name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>			  
            </fieldset>
            <div class="form-group" style="margin-top: 80px;">
              <div class="col-sm-offset-2 col-sm-10">
                  {{ csrf_field() }}
                  <div class="action-fixed-bottom animated bounceInUp">
                    <button class="btn btn-success" type="submit" ><i class="fa fa-check"></i> Save</button>
                    <a href="{{ url('/coordinator/assign') }}" class="btn btn-danger"><i class="fa fa-close"> </i> Back</a>
                  </div>
              </div>
            </div>
          </form>
          @else
          <h1>No data available.</h1>
          @endif
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.main-->
@endsection
