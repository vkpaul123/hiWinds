@extends('companyPages.layouts.app')
@section('title', 'Address')

@section('body')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<strong class="text-success">Wind-Turbine Address</strong>
		<small>add the Wind-Turbine's address</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Wind-Turbine</li>
		<li class="active">Address</li>
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
			<h3 class="box-title">Add Address</h3>
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

			<form action="{{ route('windmillAddress.store') }}" method="post" class="form-horizontal">
				{{ csrf_field() }}

				<h4><span class="text-success">Location</span></h4>

				<div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
					<label for="street" class="col-md-3 control-label">Street<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="street" name="street" placeholder="Street Name" value="{{old('street')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('locality') ? ' has-error' : '' }}">
					<label for="locality" class="col-md-3 control-label">Locality<span class="text-red">*</span></label>
					<div class="col-md-6">
						<textarea type="text" class="form-control pull-right" id="locality" name="locality" placeholder="Locality Name" rows="5">{{old('locality')}}</textarea>
					</div>
				</div>

				<div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
					<label for="region" class="col-md-3 control-label">Region<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="region" name="region" placeholder="Region Name" value="{{old('region')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('landmark') ? ' has-error' : '' }}">
					<label for="landmark" class="col-md-3 control-label">Landmark</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="landmark" name="landmark" placeholder="Landmark Name" value="{{old('landmark')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
					<label for="city" class="col-md-3 control-label">City<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="city" name="city" placeholder="City Name" value="{{old('city')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
					<label for="district" class="col-md-3 control-label">District<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="district" name="district" placeholder="District Name" value="{{old('district')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
					<label for="state" class="col-md-3 control-label">State<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="state" name="state" placeholder="State Name" value="{{old('state')}}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
					<label for="pincode" class="col-md-3 control-label">Pincode<span class="text-red">*</span></label></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="pincode" name="pincode" placeholder="Pincode" value="{{old('pincode')}}">
					</div>
				</div>
				
				<input type="hidden" name="windmill_id" value="{{ $id }}">

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