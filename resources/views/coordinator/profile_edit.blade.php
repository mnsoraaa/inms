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
          <li class="active">Profile</li>
        </ol>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Profile</h1>
        </div>
      </div>
      <!--/.row-->

      <div class="row">

        <div class="col-sm-12">

          <div class="panel panel-info">
		        <div class="panel panel-intern" style="margin-bottom: 5%;">
              <div class="panel-heading">Profile Information
              </div>
              <div class="panel-body">
                <form method="post" enctype="multipart/form-data" action="{{ url('/profile/edit/'.Auth::user()->id) }}" >
                  {{ csrf_field() }}
                  <table class="table table-striped">
                  <tr>
                    <td width="250" rowspan="12" padding="10">
                      <img src="{{ url('/img/attachments/profiles/'.$userinfo->image) }}" width="150" height="129" alt="no image found"/>
                    </td>
                    <td width="250" valign="top"><div align="left">Name:</div></td>
                    <td valign="top">
                      <input class="form-control" type="text" name="name" value="{{ $userinfo->name }}">
                    </td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Profile Image:</div></td>
                    <td valign="top">
                      <input class="form-control" type="file" name="image" >
                    </td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Address:</div></td>
                    <td valign="top">
                      <input class="form-control" type="text" name="address" value="{{ $userinfo->address }}">
                    </td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Contact No.:</div></td>
                    <td valign="top">
                      <input class="form-control" type="text" name="tel" value="{{ $userinfo->tel }}">
                    </td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Email: </div></td>
                    <td valign="top">
                      <input class="form-control" type="text" name="email" value="{{ $userinfo->email }}">
                    </td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Password: </div></td>
                    <td valign="top">
                      <input class="form-control" type="text" name="password" >
                    </td>
                  </tr>
                </table>
                <br>
                <p align="center">
                  <button type="submit" class="btn btn-success">
                    <i class="fa fa-floppy-o"></i> Save
                  </button>
                  <a href="{{ url('/profile') }}" class="btn btn-warning"> Back </a>
                </p>
                <br>
                </form>
          </div>
        </div>
      </div>
    </div>
  @endsection
