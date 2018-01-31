@extends('companyPages.layouts.app')
@section('title', 'View Wind-Turbine')

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
				<div class="col-lg-3 col-xs-6">
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
								<div class="col-md-3">
									<strong class="text-success">Manufacturer</strong>
								</div>
								<div class="col-md-6">
									{{ $windmill->manufacturer }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<strong class="text-success">Model</strong>
								</div>
								<div class="col-md-6">
									{{ $windmill->modelno }}
								</div>
							</div>
						</div>
						<br><hr><br>
						<h4 class="text-muted">Technical Specification</h4>
						<br>
						<div class="container">
							<div class="row">
								<div class="col-md-3">
									<strong class="text-success">Rated Power</strong>
								</div>
								<div class="col-md-6">
									@isset($windmill->ratedpower)
										{{ $windmill->ratedpower }} &nbsp kW
									@else
										<span class="text-muted">n/a</span>
									@endisset
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<strong class="text-success">Rated Wind Speed</strong>
								</div>
								<div class="col-md-6">
									@isset($windmill->ratedwindspeed)
										{{ $windmill->ratedwindspeed }} &nbsp m/s
									@else
										<span class="text-muted">n/a</span>
									@endisset
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<strong class="text-success">Rated Speed</strong>
								</div>
								<div class="col-md-6">
									@isset($windmill->ratedrpm)
										{{ $windmill->ratedrpm }} &nbsp RPM
									@else
										<span class="text-muted">n/a</span>
									@endisset
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<strong class="text-success">Rotor Diameter</strong>
								</div>
								<div class="col-md-6">
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
						<div class="container">
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">Street</strong>
								</div>
								<div class="col-md-8">
									{{ $address->street }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">Locality</strong>
								</div>
								<div class="col-md-8">
									{{ $address->locality }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">Region</strong>
								</div>
								<div class="col-md-8">
									{{ $address->region }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">Landmark</strong>
								</div>
								<div class="col-md-8">
									{{ $address->landmark }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">City</strong>
								</div>
								<div class="col-md-8">
									{{ $address->city }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">District</strong>
								</div>
								<div class="col-md-8">
									{{ $address->district }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">State</strong>
								</div>
								<div class="col-md-8">
									{{ $address->state }}
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<strong class="text-success">Pincode</strong>
								</div>
								<div class="col-md-8">
									{{ $address->pincode }}
								</div>
							</div>
						</div>
						
					</div>

				</div>
			</div>

		</div>
	</div>

	{{-- HAS BUGS --}}
	<div class="box">
		<div class="box-header with-border">
			<h3><strong class="text-success">Map Location</strong></h3>
			<button onclick="initialize()" class="btn btn-warning pull-right"><strong>Load Map</strong> <small>Remove this when the map is fixed</small></button>
		</div>

		<div class="box-body">
			<!-- Google map -->
			<div id="map_canvas" class="wow bounceInDown animated" data-wow-duration="500ms"></div>
			<!-- End Google map -->
			<script>
			 	function initialize() {
			 	    var myLatLng = new google.maps.LatLng(12.935549, 77.605885);

			 	    var mapOptions = {
			 	        zoom: 16,
			 	        center: myLatLng,
			 	        disableDefaultUI: true,
			 	        scrollwheel: false,
			 	        navigationControl: false,
			 	        mapTypeControl: false,
			 	        scaleControl: false,
			 	        draggable: false,
			 	        mapTypeControlOptions: {
			 	            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'roadatlas']
			 	        }
			 	    };

			 	    var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);


			 	    var marker = new google.maps.Marker({
			 	        position: myLatLng,
			 	        map: map,
			 	        // icon: 'img/location-icon.png',
			 	        title: '',
			 	    });
			 	    google.maps.event.addDomListener(window, "resize", function() {
			 	 			var center = map.getCenter();
			 	 			google.maps.event.trigger(map, "resize");
			 	 			map.setCenter(center);
			 	 		});
			 	// google.maps.event.addDomListener(window, "load", initialize);
			 	}

			 </script>
		</div>

		<div class="box-footer">
			<h4 class="text-muted">Options</h4><br>
			<div class="row">
				<div class="col-md-4">
					<a href="{{ route('windmill.edit', $windmill->id) }}" class="btn btn-block btn-success"><strong>Edit Windmill</strong></a>
				</div>
				<div class="col-md-4">
					<a href="{{ route('windmillAddress.edit', $address->id) }}" class="btn btn-block btn-success"><strong>Edit Windmill Address</strong></a>
				</div>
				<div class="col-md-4">
					<a href="" class="btn btn-block btn-danger" onclick="
           				if(confirm('Are You Sure, you want to delete this record?')) {
            				event.preventDefault();
            				document.getElementById('delete-windmill').submit();
          				}
          				else {
            				event.preventDefault();
          				}
          			"><strong>Delete Windmill</strong></a>
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