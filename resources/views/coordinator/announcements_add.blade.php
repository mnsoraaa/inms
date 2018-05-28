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
          <li class="active">Announcement</li>
        </ol>
      </div>
      <!--/.row-->

      <!-- message row -->
      <div class="row">
        <div class="container">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div><br />
          @endif
        </div>
      </div>
      <!-- /message row -->

      <div class="row">
        <div class="col-lg-6">
          <h1 class="page-header">Announcement</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">

        <div class="col-sm-12">

          <form method="post" enctype="multipart/form-data" class="form-horizontal" action="@if(!isset($announcements->id)){{ url('announcement/add') }}@else{{ url('announcement/edit/'.$announcements->id) }}@endif">
            {{csrf_field()}}
            <fieldset>
              <div class="form-group">
                <label for="objective" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                  <div class="input text required">
                    <input type="text" name="title" class="form-control" id="date" required="required" 
                      value="@if(isset($announcements->title)){{ $announcements->title }}@endif">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="tasks" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <div class="input textarea required">
                    <textarea name="description" class="form-control" id="tasks" required="required" rows="5">@if(isset($announcements->description)){{ $announcements->description }}@endif</textarea>
                  </div>
                </div>
              </div>
			        <div class="form-group">
                <label for="attachment" class="col-sm-2 control-label">Attachment</label>
                <div class="col-sm-10">
                  @if(isset($announcements->attachment))
                    <img src="{{ url('/img/attachments/announcements/'.$announcements->attachment) }}" width="150" height="129" alt="no image found">
                  @else
                    <input type="file" name="attachment" class="form-control" id="attachment">
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="is_publish" class="col-sm-2 control-label">Publish</label>
                <div class="col-sm-10">
                  <select name="publish" class="form-control" id="is_publish">
                    <option value="0" @if(isset($announcements->publish) && $announcements->publish == "0"){{ 'selected' }}@endif>Yes</option>
                    <option value="1" @if(isset($announcements->publish) && $announcements->publish == "1"){{ 'selected' }}@endif>No</option>
                  </select>
                </div>
              </div>
            </fieldset>

            <div class="form-group" style="margin-top: 80px;">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="action-fixed-bottom animated bounceInUp">
                  <button name="save" value="save" class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
                  <a href="{{ url('/coordinator/faq') }}" class="btn btn-warning"><i class="fa fa-angle-left"> </i> Back To list</a> </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  @endsection