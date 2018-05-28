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
          <li class="active">Logbook</li>
        </ol>
      </div>
      <!--/.row-->

      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Logbook</h1>
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
                  <select name="list_name" class="form-control" id="list_name">
                    <option value="1">Muhd Aiman Zakwan Bin Samsudin - CB151516</option>
                    <option value="0">Mohd Zaki Bin Abu - CB16623</option>
                  </select>
                </div>
              </div>
             
              <br>
              <div class="form-group">
                <label class="col-md-2 control-label" for="name">Company :</label>
                <div class="col-md-10">
                  ITComp.co
                </div>
              </div>

            </div>
          </div>
			
			
			
           <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

          </table>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/dataTables.rowsGroup.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
<script>
     $(document).ready( function () {
  var data = [
    ['week 1', '9/10/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<button type="button" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</button>','<button type="button" class="btn btn-sm btn-warning"> <em class="fa fa-eye"></em> Evaluate</button>'],
    ['week 1', '10/10/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<button type="button" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</button>','<button type="button" class="btn btn-sm btn-warning"> <em class="fa fa-eye"></em> Evaluate</button>'],
    ['week 1', '11/10/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<button type="button" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</button>','<button type="button" class="btn btn-sm btn-warning"> <em class="fa fa-eye"></em> Evaluate</button>'],
    ['week 1', '12/10/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<button type="button" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</button>','<button type="button" class="btn btn-sm btn-warning"> <em class="fa fa-eye"></em> Evaluate</button>'],
    ['week 1', '13/10/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<button type="button" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</button>','<button type="button" class="btn btn-sm btn-warning"> <em class="fa fa-eye"></em> Evaluate</button>'],
	    ['week 2', '13/10/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<button type="button" class="btn btn-sm btn-primary"> <em class="fa fa-eye"></em> View</button>','<button type="button" class="btn btn-sm btn-warning"> <em class="fa fa-eye"></em> Evaluate</button>'],
  ];
  var table = $('#example').DataTable({
    columns: [
        {
            name: 'first',
            title: 'Week',
        },
        {
           
            title: 'Date',
        },
        {
            title: 'Objective',
        }, 
        {
            title: 'Options',
        },
		{
			name: 'second',
            title: 'Evaluation',
        },
    ],
    data: data,
    rowsGroup: [
      'first:name',
      'second:name'
    ],
    pageLength: '5',
    });
} );
    </script>	
  @endsection
  
