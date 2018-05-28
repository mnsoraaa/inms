@extends('layouts.app')
	
	@extends('coordinator.sidemenu')
	
	@section('content')

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default articles">
					<div class="panel-heading">
						Latest News
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>

					<div class="panel-body articles-container">

						@if(count($announcements))
							@foreach($announcements as $announcement)
								<div class="article border-bottom">
									<div class="col-xs-12">
										<div class="row">
											<div class="col-xs-2 col-md-2 date">
												<div class="large">{{ Carbon\Carbon::parse($announcement->date)->format('d') }}</div>
												<div class="text-muted">{{ Carbon\Carbon::parse($announcement->date)->format('M') }}</div>
											</div>
											<div class="col-xs-10 col-md-10">
												<h4><a href="#">{{ $announcement->title }}</a></h4>
												<p>{{ $announcement->description }}</p>
												@if(isset($announcement->attachment))
							                    	<img src="{{ url('/img/attachments/announcements/'.$announcement->attachment) }}" width="150" height="129" alt="no image found">
							                  	@else
							                    	No attachment.
							                  	@endif
											</div>
										</div>
									</div>
									<div class="clear"></div>
								</div><!--End .article-->
							@endforeach
						@else
							<div class="article border-bottom">
								<div class="col-xs-12">
									<div class="row">
										<div class="col-xs-12 col-md-12">
											<h4><a href="#">No announcement are available.</a></h4>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div><!--End .article-->
						@endif
						
					</div>
				</div><!--End .articles-->
				
			</div><!--/.col-->
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Calendar
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
			
			</div><!--/.col-->
			
			<div class="col-sm-12">		
				<h2>Frequently Asked Questions</h2>

				<div class="panel-group" id="faqAccordion">
					@if(count($faqs))
						@foreach($faqs as $faq)
				        <div class="panel panel-default ">
				            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question{{ $faq->id }}">
				                 <h4 class="panel-title">
				                    <a href="#" class="ing">Q: {{ $faq->question }}</a>
				              	</h4>
				            </div>
				            <div id="question{{ $faq->id }}" class="panel-collapse collapse" style="height: 0px;">
				                <div class="panel-body">
				                    <h5><span class="label label-primary">Answer</span></h5>
				                    <p>{{ $faq->answer }}</p>
				                    @if(isset($faq->attachment))
				                    	<img src="{{ url('/img/attachments/faqs/'.$faq->attachment) }}" width="150" height="129" alt="no image found">
				                    @else
				                    	No attachment.
				                  	@endif
				                </div>
				            </div>
				        </div>
				        @endforeach
				     @else
				     	<div class="panel panel-default ">
				            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
				                 <h4 class="panel-title">
				                    <a href="#" class="ing">No question</a>
				              	</h4>
				            </div>
				            <div id="question0" class="panel-collapse collapse" style="height: 0px;">
				                <div class="panel-body">
				                     <h5><span class="label label-primary">No answer</span></h5>

				                    <p>-</p>
				                </div>
				            </div>
				        </div>
				     @endif
			    </div>
			</div>
	@endsection