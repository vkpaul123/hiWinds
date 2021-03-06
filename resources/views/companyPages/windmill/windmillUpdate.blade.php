@extends('companyPages.layouts.app')
@section('title', 'Add Wind-Turbine')
@section('sideBarActivator_WindTurbines', 'class=active')

@section('body')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<strong class="text-success">Wind-Turbine</strong>
		<small>add a wind-turbine</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Wind-Turbine</li>
	</ol>
</section>

<section class="content">
	@if (Session::has('message'))
	  <div class="alert alert-info">{!! Session::get('message') !!}
	    <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
	  </div>
	@endif
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Add Wind-Turbine Details</h3>
		</div>
		<div class="box-body">
			
			@if (Session::has('messageFail'))
			<div class="alert alert-danger">{!! Session::get('messageFail') !!}
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			</div>
			@endif
			@if (Session::has('messageSuccess'))
			<div class="alert alert-success">{!! Session::get('messageSuccess') !!}
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
			</div>
			@endif
			@if(count($errors) > 0)
			<center>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
					<strong>
						You Have Errors while submitting. Please Fill up the information in the Fields that are Highlighted in Red.
					</strong>
					<hr>
					@foreach ($errors->all() as $error)
					{{ $error }} <br>
					@endforeach
				</div>
			</center>
			@endif

			<form action="{{ route('windmill.update', $windmill->id) }}" method="post" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				<h4><span class="text-success">General Specifications</span></h4>

				<div class="form-group{{ $errors->has('manufacturer') ? ' has-error' : '' }}">
					<label for="manufacturer" class="col-md-3 control-label">Manufacturer<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="manufacturer" name="manufacturer" placeholder="Manufacturer Name" rows="5" value="{{ $windmill->manufacturer }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('modelno') ? ' has-error' : '' }}">
					<label for="modelno" class="col-md-3 control-label">Model<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="modelno" name="modelno" placeholder="Model No" value="{{ $windmill->modelno}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('ratedpower') ? ' has-error' : '' }}">
					<label for="ratedpower" class="col-md-3 control-label">Rated Power</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="ratedpower" name="ratedpower" placeholder="Rated Power (kW)" value="{{ $windmill->ratedpower }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('ratedwindspeed') ? ' has-error' : '' }}">
					<label for="ratedwindspeed" class="col-md-3 control-label">Rated Wind Speed</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="ratedwindspeed" name="ratedwindspeed" placeholder="Rated Wind Speed (m/s)" value="{{ $windmill->ratedwindspeed }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('ratedrpm') ? ' has-error' : '' }}">
					<label for="ratedrpm" class="col-md-3 control-label">Rated Speed</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="ratedrpm" name="ratedrpm" placeholder="Rated Speed (RPM)" value="{{ $windmill->ratedrpm }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('rotordiameter') ? ' has-error' : '' }}">
					<label for="rotordiameter" class="col-md-3 control-label">Rotor Diameter</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="rotordiameter" name="rotordiameter" placeholder="Rotor Diameter (m)" value="{{ $windmill->rotordiameter }}">
					</div>
				</div>

				<hr>
				<div class="form-group">
					<div class="col-md-offset-5 col-md-2">
						<button type="submit" class="btn btn-success btn-block pull-right"><strong>Submit</strong></button>
					</div>
				</div>
			</form>

		</div>

		<div class="box-footer">
			<span class="text-red"><strong>*</strong></span>Required Fields
		</div>
	</div>
</section>

@endsection