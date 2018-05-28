@section('sidemenu')
<!--sidebar-->
	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="{{ url('/img/attachments/profiles/'.Auth::user()->image) }}" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Coordinator</div>
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
			<li class=""><a href="{{ url('/coordinator/dashboard') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{ url('/coordinator/message') }}"><em class="fa fa-envelope">&nbsp;</em> Messages</a></li>
			<li><a href="{{ url('/coordinator/assign') }}"><em class="fa fa-id-badge">&nbsp;</em> Assign Supervisor</a></li>		
			<li><a href="{{ url('/coordinator/schedule') }}"><em class="fa fa-calendar">&nbsp;</em> Schedules</a></li>
			
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-folder">&nbsp;</em> General <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="{{ url('/coordinator/announcement') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> Announcement
					</a></li>
					<li><a class="" href="{{ url('/coordinator/faq') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> FAQ
					</a></li>
				</ul>
			</li>

		</ul>
	</div><!--/.sidebar-->
@endsection