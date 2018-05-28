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
          <li class="active">Evaluation</li>
        </ol>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Evaluation</h1>
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
                  <select name="student_id" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="">Please select</option>
                    @if(count($student_lists))
                      @foreach($student_lists as $student_list)
                      <option value="{{ url('/'.Auth::user()->roleName().'/evaluation/'.$student_list->student->id) }}" @if(count($student) && $student->id == $student_list->student->id) {{ 'selected' }}@endif>
                        {{ $student_list->student->name." - ".$student_list->student->matricID }}
                      </option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Company :</label>
                <div class="col-md-10">
                  <label id="companyName"></label>
                  @if(!empty($student))
                    {{ $student->companyName }}
                  @else
                    {{ "N/A" }}
                  @endif
                </div>
              </div>
      			  <br>
      			  <div class="form-group">
                <label class="col-md-2 control-label" for="name">Email :</label>
                <div class="col-md-10">
                  <label id="email"></label>
                  @if(!empty($student))
                    {{ $student->email }}
                  @else
                    {{ "N/A" }}
                  @endif
                </div>
              </div>
      			  <br>
      			  <div class="form-group">
                <label class="col-md-2 control-label" for="name">Phone No :</label>
                <div class="col-md-10">
                  <label id="tel"></label>
                  @if(!empty($student))
                    {{ $student->tel }}
                  @else
                    {{ "N/A" }}
                  @endif
                </div>
              </div>
            </div>
          </div>
          
          <div class="panel panel-logbook">
            <div class="panel-heading">Logbook 
              <span class="container-fluid pull-right">
                @if(!empty($student))
                  <a href="{{ url(Auth::user()->roleName().'/evaluation/edit/logbook/'.$student->id) }}" class="btn btn-warning btn-sm"> <em class="fa fa-plus"></em> Edit</a>
                @endif
              </span>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">SV Report (15%) :</label>              
                <div class="col-sm-10">
                  <input  type="text" name="markL" value="@if(!empty($evaluation->markLogbook)){{ $evaluation->markLogbook }}@else{{ 'N/A' }}@endif" disabled>%
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Remarks :</label>              
                <div class="col-sm-10">
                    <textarea name="remarks" class="form-control" id="remarks" rows="5"  disabled>@if(!empty($evaluation->remarksLogbook)){{ $evaluation->remarksLogbook }}@else{{ 'N/A' }}@endif</textarea>
                </div>
              </div>
            </div>
          </div>

    		  <div class="panel panel-intern">
            <div class="panel-heading">Internship 
        			<span class="container-fluid pull-right">
        				@if(!empty($student))
                  <a href="{{ url(Auth::user()->roleName().'/evaluation/edit/internship/'.$student->id) }}" class="btn btn-warning btn-sm"> <em class="fa fa-plus"></em> Edit</a>
                @endif
        			</span>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">SV Report (15%) :</label>              
                <div class="col-sm-10">
                  <input  type="text" name="markL" value="@if(!empty($evaluation->markInternship)){{ $evaluation->markInternship }}@else{{ 'N/A' }}@endif" disabled>%
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Remarks :</label>              
                <div class="col-sm-10">
                    <textarea name="remarks" class="form-control" id="remarks" rows="5"  disabled>@if(!empty($evaluation->remarksInternship)){{ $evaluation->remarksInternship }}@else{{ 'N/A' }}@endif</textarea>
                </div>
              </div>
            </div>
          </div>
          <!-- IndustrialSV doesnt have to evaluate in terms of internship
    		  <div class="panel panel-present">
            <div class="panel-heading">Presentation 
        			<span class="container-fluid pull-right">
        				@if(!empty($student))
                  <a href="{{ url(Auth::user()->roleName().'/evaluation/edit/presentation/'.$student->id) }}" class="btn btn-warning btn-sm"> <em class="fa fa-plus"></em> Edit</a>
                @endif
        			</span>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">LI Report (70%) :</label>              
                <div class="col-sm-10">
                  <input  type="text" name="markL" value="@if(!empty($evaluation->markPresent)){{ $evaluation->markPresent }}@else{{ 'N/A' }}@endif" disabled>%
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Remarks :</label>              
                <div class="col-sm-10">
                    <textarea name="remarks" class="form-control" id="remarks" rows="5"  disabled>@if(!empty($evaluation->remarksPresent)){{ $evaluation->remarksPresent }}@else{{ 'N/A' }}@endif</textarea>
                </div>
              </div>
            </div>
          </div>
          -->

        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.main-->
  @endsection
