@extends('companyPages.layouts.app')
@section('title', 'View Wind-Turbine')
@section('sideBarActivator_WindTurbines', 'class=active')

@section('body')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<strong class="text-success">View Wind-Turbine</strong>
		<small>details of the wind-turbine</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Wind-Turbine</li>
		<li class="active">Show</li>
	</ol>
</section>

<section class="content">
	@if (Session::has('message'))
	  <div class="alert alert-info">{!! Session::get('message') !!}
	    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
	  </div>
	@endif
	<div class="box box-success">
		<div class="box-body">
			@if (Session::has('messageSuccess'))
			<div class="alert alert-success">{!! Session::get('messageSuccess') !!}
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			</div>
			@endif
			
			<div class="row">
				<div class="col-lg-3 col-xs-5">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>{{ $windmill->id }}</h3>
		            </div>
		            <div class="icon">
		              <i class="fa fa-key" style="padding-top: 10px;"></i>
		            </div>
		            <span class="small-box-footer">Wind-Turbine ID</span>
		          </div>
		        </div>
		        <div class="col-md-3 pull-right">
		        	<a href="{{ route('windmill.index') }}" class="btn btn-block btn-info">Back</a>
		        	<a href="{{ route('windmill.log', $windmill->id) }}" class="btn btn-block btn-lg btn-primary"><strong>View Log</strong></a>
		        </div>
			</div>
			
			<div class="col-md-6">
				<div class="box">
					<div class="box-header with-border">
						<h4 class="text-success"><strong>Wind-Turbine Details</strong></h4>
					</div>
					
					<div class="box-body">
						<h4 class="text-muted">General Information</h4>
						<br>
						<div class="container">
							<div class="row">
								<div class="col-md-3 col-xs-7">
									<strong class="text-success">Manufacturer</strong>
								</div>
								<div class="col-md-6 col-xs-5">
									{{ $windmill->manufacturer }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-xs-7">
									<strong class="text-success">Model</strong>
								</div>
								<div class="col-md-6 col-xs-5">
									{{ $windmill->modelno }}
								</div>
							</div>
						</div>
						<br><hr><br>
						<h4 class="text-muted">Technical Specification</h4>
						<br>
						<div class="container">
							<div class="row">
								<div class="col-md-3 col-xs-7">
									<strong class="text-success">Rated Power</strong>
								</div>
								<div class="col-md-6 col-xs-5">
									@isset($windmill->ratedpower)
										{{ $windmill->ratedpower }} &nbsp kW
									@else
										<span class="text-muted">n/a</span>
									@endisset
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-xs-7">
									<strong class="text-success">Rated Wind Speed</strong>
								</div>
								<div class="col-md-6 col-xs-5">
									@isset($windmill->ratedwindspeed)
										{{ $windmill->ratedwindspeed }} &nbsp m/s
									@else
										<span class="text-muted">n/a</span>
									@endisset
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-xs-7">
									<strong class="text-success">Rated Speed</strong>
								</div>
								<div class="col-md-6 col-xs-5">
									@isset($windmill->ratedrpm)
										{{ $windmill->ratedrpm }} &nbsp RPM
									@else
										<span class="text-muted">n/a</span>
									@endisset
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-xs-7">
									<strong class="text-success">Rotor Diameter</strong>
								</div>
								<div class="col-md-6 col-xs-5">
									@isset($windmill->rotordiameter)
										{{ $windmill->rotordiameter }} &nbsp m
									@else
										<span class="text-muted">n/a</span>
									@endisset
								</div>
							</div>
						</div>
						<br>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="box">
					<div class="box-header with-border">
						<h4 class="text-success"><strong>Address</strong></h4>
					</div>
					
					<div class="box-body">
						<div class="container-fluid">
						@isset($address)
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">Street</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->street }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">Locality</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->locality }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">Region</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->region }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">Landmark</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->landmark }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">City</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->city }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">District</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->district }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">State</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->state }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<strong class="text-success">Pincode</strong>
								</div>
								<div class="col-md-8 col-xs-8">
									{{ $address->pincode }}
								</div>
							</div>

						@else

						<center>
							<div class="jumbotron">
								<h4 class="text-danger"><i class="fa fa-exclamation-triangle" style="font-size: 2em;"></i><br>Address Not Found!<br><small>Address not added for this Wind-Turbine. Please add an address.</small></h4><hr>
								<a href="{{ route('windmillAddress.show', $windmill->id) }}" class="btn btn-primary pull-right"><strong>Add Address</strong></a>
							</div>
						</center>

						@endisset
						
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<div class="col-md-6 col-xs-6">
				<a href="{{ route('windmill.edit', $windmill->id) }}" class="btn btn-success pull-right"><strong>Edit Details</strong></a>
			</div>

			@isset($address->id)
			
			<div class="col-md-6 col-xs-6">
				<a href="{{ route('windmillAddress.edit', $address->id) }}" class="btn pull-right btn-success"><strong>Edit Address</strong></a>
			</div>

			@endisset
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="box">
				<div class="box-header with-border">
					<div class="h4">Wind-Turbine Stats <small>Past 6 Months in <strong>MiliWatts (mW)</strong></small></div>
				</div>
				<div class="box-body">
					<div id="bar-chart" style="height: 300px"></div>
				</div>

				<div class="box-footer">
					<a href="" class="btn pull-right btn-danger" onclick="
		   				if(confirm('Are You Sure, you want to delete this record?')) {
		    				event.preventDefault();
		    				document.getElementById('delete-windmill').submit();
		  				}
		  				else {
		    				event.preventDefault();
		  				}
		  			"><strong>Delete Wind-Turbine</strong></a>
		  			<form method="post" id="delete-windmill" action="{{ route('windmill.destroy', $windmill->id) }}" style="display: none;">
		  			  {{ csrf_field() }}
		  			  {{ method_field('DELETE') }}
		  			</form>
				</div>
			</div>
		</div>
	</div>

</section>

@endsection

@section('pageSpecificLoadScripts')
  <!-- FLOT CHARTS -->
  <script src="{{ asset('rawThemes/adminLTE/bower_components/Flot/jquery.flot.js') }}"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="{{ asset('rawThemes/adminLTE/bower_components/Flot/jquery.flot.resize.js') }}"></script>
  <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
  <script src="{{ asset('rawThemes/adminLTE/bower_components/Flot/jquery.flot.categories.js') }}"></script>
  {{-- EXTRA SCRIPTS --}}

	<script>
		$(function() {

			$.ajax({
				url: '{{ route('windmill.monthlyPower.graph', $windmill->id) }}',
				type: 'GET',
				dataType: 'json',
				data: {},
			})
			.done(function(data) {
				console.log("success");
				var arr = Object.values(data);
				console.log(arr);

				$.plot('#bar-chart', [arr], {
				  grid  : {
				    borderWidth: 1,
				    borderColor: '#f3f3f3',
				    tickColor  : '#f3f3f3'
				  },
				  series: {
				    bars: {
				      show    : true,
				      barWidth: 0.5,
				      align   : 'center'
				    }
				  },
				  xaxis : {
				    mode      : 'categories',
				    tickLength: 0
				  }
				})
				/* END BAR CHART */
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});		    
		})
	</script>  
@endsection