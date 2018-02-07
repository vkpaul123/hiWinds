@extends('companyPages.layouts.app')
@section('title', 'Edit Profile')
@section('sideBarActivator_Home', 'class=active')

@section('body')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<strong class="text-success">Edit Profile</strong>
		<small>edit your Profile Details</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Profile</li>
		<li class="active">Edit</li>
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
			<h3 class="box-title">Edit Profile Details</h3>
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

			<form action="{{ route('user.profileUpdate') }}" method="post" class="form-horizontal">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				<h4><span class="text-success">Personal Information</span></h4>

				<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
					<label for="firstname" class="col-md-3 control-label">First Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="firstname" name="firstname" placeholder="First Name" value="{{ Auth::user()->firstname }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
					<label for="middlename" class="col-md-3 control-label">Middle Name</label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="middlename" name="middlename" placeholder="Middle Name" value="{{ Auth::user()->middlename }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
					<label for="lastname" class="col-md-3 control-label">Last Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="lastname" name="lastname" placeholder="Last Name" value="{{ Auth::user()->lastname }}">
					</div>
				</div>

				<div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
					<label for="companyname" class="col-md-3 control-label">Company Name<span class="text-red">*</span></label>
					<div class="col-md-6">
						<input type="text" class="form-control pull-right" id="companyname" name="companyname" placeholder="Company Name" value="{{ Auth::user()->companyname }}">
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

	<div class="container-fluid">
		<div class="row">
			<div class="box">
				<div class="box-header with-border">
					<h4 class="text-success"><strong>Profile Picture</strong> &nbsp <small class="pull-right">Please Upload a <b>Square</b> (1:1 aspect ratio) Picture Only.</small></h4>
				</div>

				<div class="box-body">
					<center>
						@isset(Auth::user()->photo)
							<img src="{{ Auth::user()->photo }}" alt="" class="img-rounded img-responsive img-thumbnail" height="100">
						@else
							<img src="{{ asset('rawThemes/staticImages/user.png') }}" alt="" class="img-rounded img-responsive img-thumbnail" width="160px">
						@endisset

					</center>
								
					<br>
					<div class="container-fluid">
						<div class="row">
							<form action="{{ route('user.profilePhotoUpload') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}
								{{ method_field('PUT') }}

								<div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
									<label for="photo" class="col-md-3 control-label">Profile Photo (JPG)<span class="text-red">*</span></label>
									<div class="col-md-6">
										<input type="file" class="form-control pull-right" id="photo" name="photo"  value="{{old('photo')}}">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-5 col-md-2">
										<button type="submit" class="btn btn-success btn-block pull-right"><strong>Submit</strong></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<span class="text-red"><strong>*</strong></span>Required Fields
				</div>
			</div>
		</div>
	</div>
</section>

@endsection