@extends('layouts.app')
  
  @extends('facultysv.sidemenu')
  
  @section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li>
          <a href="#"><em class="fa fa-home"></em></a>
        </li>
        <li class="active">Evaluation</li>
      </ol>
    </div><!--/.row-->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Evaluation</h1>
      </div>
    </div><!--/.row-->
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            Student Information
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Name :</label>
              <div class="col-md-10">
                {{ $student->name }}
              </div>
            </div><br>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Matric ID :</label>
              <div class="col-md-10">
                {{ $student->matricID }}
              </div>
            </div><br>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Company :</label>
              <div class="col-md-10">
                {{ $student->companyName }}
              </div>
            </div><br>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Email :</label>
              <div class="col-md-10">
                {{ $student->email }}
              </div>
            </div><br>
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Phone No :</label>
              <div class="col-md-10">
                {{ $student->tel }}
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-intern" style="margin-bottom: 5%;">
          <div class="panel-heading">
            Internship
            <div class="pull-right">
              Current percentage: @if(!empty($evaluation)){{ $evaluation->markInternship }}@else{{ '0' }}@endif %
            </div>
          </div>
          <div class="panel-body">
            <p>Supervisor is required to select ( / ) any related radio button using the following guidelines.</p>
            <div class="form-group">
              <table cellspacing="0" class="table table-bordered table-responsive" width="100%">
                <tbody>
                  <tr>
                    <td class=""></td>
                    <td class="" style="width: 10%">1 - Very Poor</td>
                    <td class="" style="width: 10%">2 - Poor</td>
                    <td class="" style="width: 10%">3 - Neutral</td>
                    <td class="" style="width: 10%">4 - Good</td>
                    <td class="" style="width: 10%">5 - Excellent</td>
                  </tr>
                  <tr>
                    <td>Student understand the structure of organization.</td>
                    <td><input type="radio" value="1" id="evaluate1" name="evaluate1"></td>
                    <td><input type="radio" value="2" id="evaluate1" name="evaluate1"></td>
                    <td><input type="radio" value="3" id="evaluate1" name="evaluate1"></td>
                    <td><input type="radio" value="4" id="evaluate1" name="evaluate1"></td>
                    <td><input type="radio" value="5" id="evaluate1" name="evaluate1"></td>
                  </tr>
                  <tr>
                    <td>Able to finish task in the given time.</td>
                    <td><input type="radio" value="1" id="evaluate2" name="evaluate2"></td>
                    <td><input type="radio" value="2" id="evaluate2" name="evaluate2"></td>
                    <td><input type="radio" value="3" id="evaluate2" name="evaluate2"></td>
                    <td><input type="radio" value="4" id="evaluate2" name="evaluate2"></td>
                    <td><input type="radio" value="5" id="evaluate2" name="evaluate2"></td>
                  </tr>
                  <tr>
                    <td>Able to apply new knowledge in the task given.</td>
                    <td><input type="radio" value="1" id="evaluate3" name="evaluate3"></td>
                    <td><input type="radio" value="2" id="evaluate3" name="evaluate3"></td>
                    <td><input type="radio" value="3" id="evaluate3" name="evaluate3"></td>
                    <td><input type="radio" value="4" id="evaluate3" name="evaluate3"></td>
                    <td><input type="radio" value="5" id="evaluate3" name="evaluate3"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="knowledge">Remarks:</label>
              <div class="col-sm-12">
                <div class="input textarea required">
                  <form action="{{ url('/evaluation/add/internship') }}" method="POST" id="evaluationInternship">
                    {{ csrf_field() }}
                    <textarea class="form-control" id="remarksInternship" name="remarksInternship" required="required" rows="5">@if(!empty($evaluation)){{ $evaluation->remarksInternship }}@endif</textarea>
                    <input type="hidden" name="markInternship" id="markInternship" value="">
                    <input type="hidden" name="studentID" value="{{ $student->id }}">
                  </form>
                </div>
              </div>
            </div>
            <div class="form-group" style="margin-top: 80px;">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="action-fixed-bottom animated bounceInUp">
                  <button form="evaluationInternship" class="btn btn-success" name="save" type="submit" value="save"><i class="fa fa-save"></i> Save</button>
                  <a class="btn btn-warning" href="{{ url(Auth::user()->roleName().'/evaluation') }}"><i class="fa fa-angle-left"></i> Back To list</a>
                </div>
              </div>
            </div>
          </div><!--panelbody-->
        </div>
      </div>
    </div><!--/.row-->
  </div><!--/.main-->
  @endsection

  @section('javascript')

    var evaluate1 = 0;
    var evaluate2 = 0;
    var evaluate3 = 0;
    var totalEvaluate = 0;

    $("input[name='evaluate1']").change(function(){
      evaluate1 = $(this).val();
      totalEvaluate = parseInt(evaluate1) + parseInt(evaluate2) + parseInt(evaluate3);
      $('#markInternship').val(totalEvaluate);
    });

    $("input[name='evaluate2']").change(function(){
      evaluate2 = $(this).val();
      totalEvaluate = parseInt(evaluate1) + parseInt(evaluate2) + parseInt(evaluate3);
      $('#markInternship').val(totalEvaluate);
    });

    $("input[name='evaluate3']").change(function(){
      evaluate3 = $(this).val();
      totalEvaluate = parseInt(evaluate1) + parseInt(evaluate2) + parseInt(evaluate3);
      $('#markInternship').val(totalEvaluate);
    });
    
  @endsection
