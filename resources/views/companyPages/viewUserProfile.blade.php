@extends('companyPages.layouts.app')
@section('title', 'Profile Page')
@section('sideBarActivator_Home', 'class=active')

@section('pageSpecificHeadContent')
  {{-- EXTRA HEAD CONTENT --}}
@endsection

@section('body')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <strong class="text-success">Commercial Profile</strong>
    <small>this is your profile</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-success">
		<div class="box-header with-border">
			<div class="row">
				<div class="col-md-2">
					@isset(Auth::user()->photo)
						<img src="{{ Auth::user()->photo }}" alt="Profile Picture" class="img-rounded img-responsive img-thumbnail">
					@else
						<img src="{{ asset('rawThemes/staticImages/user.png') }}" alt="Profile Picture" class="img-rounded img-responsive img-thumbnail">
					@endisset
					
				</div>
				<div class="col-md-6">
					<h2 class="text-success">{{ @Auth::user()->companyname }}</h2>
					<h4 class="text-muted">{{ @Auth::user()->firstname." ".@Auth::user()->middlename." ".@Auth::user()->lastname }}</h4>
				</div>
				<div class="pull-right col-md-2 col-md-offset-2 col-xs-12">
					<br>
					<a href="{{ route('user.profileEdit') }}" class="btn btn-block btn-primary">Edit Profile</a>
					<a href="{{ route('address.edit', Auth::user()->address_id) }}" class="btn btn-block btn-primary">Edit Address</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="box">
				<div class="box-header with-border">
					<h4>Company Statistics</h4>
				</div>
			
				<div class="box-body">
					<div class="container-fluid">
					<div class="col-md-4">
						<div class="row">
							<div class="box">
								<div class="box-body">
									<div class="row">
										<div class="col-md-6 col-xs-8"><strong class="text-success">Wind-Turbine Count</strong></div>
										<div class="col-md-6 col-xs-4">{{ $windmillsCount }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-8"><strong class="text-success">Total Power Capacity</strong></div>
										<div class="col-md-6 col-xs-4">{{ $powerCapacity }} kW</div>
									</div>
									<hr><br>
									<div class="row">
										<div class="col-md-6">
											<h4 class="text-success"><strong>Address</strong></h4><br>
										</div>
									</div>
									@isset($address)
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">Street</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->street }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">Locality</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->locality }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">Region</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->region }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">Landmark</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->landmark }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">City</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->city }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">District</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->district }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">State</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->state }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">Pincode</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->pincode }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">Phone</strong></div>
										<div class="col-md-6 col-xs-8">{{ $address->phone1 }} &nbsp {{ $address->phone2 }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">E-Mail</strong></div>
										<div class="col-md-6 col-xs-8">{{ Auth::user()->email }}</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-xs-4"><strong class="text-success">Website</strong></div>
										<div class="col-md-6 col-xs-8"><a href="http://{{ $address->website }}" class="text-info" target="_blank">{{ $address->website }}</a></div>
									</div>
									@else
										<center>
											<div class="jumbotron">
												<h4 class="text-danger"><i class="fa fa-exclamation-triangle" style="font-size: 2em;"></i><br>Address Not Found!<br><small>Address not added for this Profile. Please add an address.</small></h4><hr>
												<a href="{{ route('address.create') }}" class="btn btn-primary pull-right"><strong>Add Address</strong></a>
											</div>
										</center>
									@endisset
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-md-offset-1">
						<div class="row">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="text-success">Monthly Power Generation</h4>
								</div>
								<div class="box-body">
									<div id="bar-chart" style="height: 335px;"></div>
								</div>
								<div class="box-footer">
									<center><small><i class="text-muted">Last 6 months</i></small></center>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="box">
				<box-header class="box-header with-border">
					<h4>Company Location</h4>
				</box-header>

				<div class="box-body">
					<div class="jumbotron">
						<h2>Insert Company Google Map location here</h2>
					</div>
				</div>

				<div class="box-footer">
					<a href="{{ route('home') }}" class="btn pull-right btn-info">Back</a>
				</div>
			</div>
		</div>
	</div>

</section>
<!-- /.content -->

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
			/*
		     * BAR CHART
		     * ---------
		     */

		    var bar_data = {
		      data : [['January', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9]],
		      color: '#00a65a'
		    }
		    $.plot('#bar-chart', [bar_data], {
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
	</script>  
@endsection