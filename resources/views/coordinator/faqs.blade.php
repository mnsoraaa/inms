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
          <li class="active">FAQ</li>
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
          <h1 class="page-header">Frequently Asked Questions</h1>
        </div>
        <div class="col-lg-6">
          <span class="container-fluid pull-right">
				<a href="{{ url('/coordinator/faq/add') }}" class="btn btn-success btn-sm page-header"> <em class="fa fa-plus"></em> Add New</a>
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
                <th>Date</th>
                <th>Questions</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @if(count($faqs))
                @foreach ($faqs as $i => $faq)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <form action="{{ url('/faq/delete/'.$faq->id) }}" method="post" onsubmit="return confirm('Do you really want to delete?');">
                      <td>
                        <a href="{{ url('/coordinator/faq/show/'.$faq->id) }}" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</a>
                        <a href="{{ url('/coordinator/faq/edit/'.$faq->id) }}" class="btn btn-sm btn-warning"> <em class="fa fa-edit"></em> Edit</a>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-sm btn-danger"> <em class="fa fa-trash"></em> Delete</button>
                      </td>
                    </form>
                  </tr>
                @endforeach
              @else
                <tr>
                    <td colspan="4" style="text-align: center;">No records available.</td>
                </tr>
              @endif
            </tbody>
          </table>

        </div>
      </div>
    </div>
  @endsection
