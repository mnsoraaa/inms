@section('sidemenu')
<!--sidebar-->
	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="{{ url('/img/attachments/profiles/'.Auth::user()->image) }}" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">JJIM</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class=""><a href="{{ url('/jjim/dashboard') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{ url('/jjim/message') }}"><em class="fa fa-envelope">&nbsp;</em> Messages</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-folder">&nbsp;</em> Reports <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="{{ url('/jjim/report/student') }}">
							<span class="fa fa-arrow-right">&nbsp;</span> Report Student List
						</a>
					</li>
					<li>
						<a class="" href="{{ url('/jjim/report/facultysv') }}">
							<span class="fa fa-arrow-right">&nbsp;</span> Reports FacultySV List
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div><!--/.sidebar-->
@endsection