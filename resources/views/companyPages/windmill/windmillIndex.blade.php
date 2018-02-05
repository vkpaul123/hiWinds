@extends('companyPages.layouts.app')
@section('title', 'All Wind-Turbines')
@section('sideBarActivator_WindTurbines', 'class=active')

@section('pageSpecificHeadContent')
	<link rel="stylesheet" href="{{ asset('rawThemes/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

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
	
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">All Wind-Turbines</h3>

			<a href="{{ route('windmill.create') }}" class="btn btn-primary pull-right"><strong>Add New</strong> Wind-Turbine</a>
		</div>
		
		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<div class="box">
						<div class="box-header with-border">
							<h4 class="text-success"><strong>Upload File</strong> &nbsp <small class="pull-right">Please Upload the <b>XLSX/Excel</b> File with Wind-Turbine data.</small></h4>
						</div>
						<div class="box-body">
							@if (Session::has('message'))
								<div class="alert alert-danger">{!! Session::get('message') !!}
									<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
								</div>
							@endif
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
							
							<form action="{{ route('windmill.excel.upload') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="form-group{{ $errors->has('excelFile') ? ' has-error' : '' }}">
									<label for="excelFile" class="col-md-3 control-label">Excel File (.XLSX)<span class="text-red">*</span></label>
									<div class="col-md-6">
										<input type="file" class="form-control pull-right" id="excelFile" name="excelFile"  value="{{old('excelFile')}}">
									</div>
								</div>
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
				</div>
			</div><br>
			<div class="table-responsive no-padding">
				<table id="windmillstable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Manufacturer</th>
							<th>Model</th>
						</tr>
					</thead>
					<tbody>
						@foreach($windmills as $windmill)
							<tr>
								<td ><a href="{{ route('windmill.show', $windmill->id) }}" class="text-muted"><strong>{{ $windmill->id }}</strong></a></td>
								<td ><a href="{{ route('windmill.show', $windmill->id) }}" class="text-info"><strong>{{ $windmill->manufacturer }}</strong></a></td>
								<td ><a href="{{ route('windmill.show', $windmill->id) }}" class="text-muted"><strong>{{ $windmill->modelno }}</strong></a></td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Manufacturer</th>
							<th>Model</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</section>

@endsection

@section('pageSpecificLoadScripts')
	<script src="{{ asset('rawThemes/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('rawThemes/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
	{{-- FastClick --}}
	<script src="{{ asset('rawThemes/adminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>

	<script>
	  $(function () {
	    $('#windmillstable').DataTable({
	      'paging'      : true,
	      'lengthChange': true,
	      'searching'   : true,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : true
	    })
	  })
	</script>
@endsection