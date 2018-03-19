@extends('companyPages.auth.layouts.app')
@section('title', 'Register')

@section('body')

<div class="login-logo">
	<a href="/">High<strong>Winds</strong><span class="text-muted">|</span><small style="font-size: 0.5em;">monitoring LIVE!</small></a>
</div>
<!-- /.login-logo -->

<div class="login-box-body">
	<p class="login-box-msg"><b>Register</b> with a New <span class="text-success">Commercial</span> profile...</p>

	<form action="{{ route('register') }}" method="post">
	{{ csrf_field() }}
		<div class="form-group has-feedback{{ $errors->has('firstname') ? ' has-error' : '' }}">
			<input type="text" name="firstname" class="form-control" placeholder="First Name" value="{{ old('firstname') }}" required autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('firstname'))
			<span class="help-block">
				<strong>{{ $errors->first('firstname') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('middlename') ? ' has-error' : '' }}">
			<input type="text" name="middlename" class="form-control" placeholder="Middle Name" value="{{ old('middlename') }}" autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('middlename'))
			<span class="help-block">
				<strong>{{ $errors->first('middlename') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('lastname') ? ' has-error' : '' }}">
			<input type="text" name="lastname" class="form-control" placeholder="Last Name" value="{{ old('lastname') }}" required autofocus>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			@if ($errors->has('lastname'))
			<span class="help-block">
				<strong>{{ $errors->first('lastname') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('companyname') ? ' has-error' : '' }}">
			<input type="text" name="companyname" class="form-control" placeholder="Company Name" value="{{ old('companyname') }}" required autofocus>
			<span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
			@if ($errors->has('companyname'))
			<span class="help-block">
				<strong>{{ $errors->first('companyname') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
			<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
			<input type="password" class="form-control" placeholder="Password" name="password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		
		<div class="row">
			<div class="col-xs-4 pull-right">
				<button type="submit" class="btn btn-success btn-block">Register</button>
			</div>
			<!-- /.col -->
		</div>
	</form>

</div>
<!-- /.login-box-body -->

@endsection