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
          <li class="active">Profile</li>
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
        				<table class="table table-striped">
                  <tr>
                    <td width="250" rowspan="12" padding="10">
                      <img src="{{ url('/img/attachments/profiles/'.$userinfo->image) }}" width="150" height="129" alt="no image found"/>
                    </td>
                    <td width="250" valign="top"><div align="left">Name:</div></td>
                    <td valign="top">{{ $userinfo->name }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Address:</div></td>
                    <td valign="top">{{ $userinfo->address }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Contact No.:</div></td>
                    <td valign="top">{{ $userinfo->tel }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Email: </div></td>
                    <td valign="top">{{ $userinfo->email }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Company Name: </div></td>
                    <td valign="top">{{ $userinfo->companyName }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Company Address: </div></td>
                    <td valign="top">{{ $userinfo->companyAdd }}</td>
                  </tr>
                  <tr>
                    <td valign="top"><div align="left">Company Contact Number: </div></td>
                    <td valign="top">{{ $userinfo->companyTel }}</td>
                  </tr>
                </table>
                <br>
                <p align="center">
                  <a href="{{ url(Auth::user()->roleName().'/profile/edit/') }}" class="btn btn-success">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                </p>
                <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
