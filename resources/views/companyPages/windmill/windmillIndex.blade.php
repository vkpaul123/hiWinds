@extends('companyPages.layouts.app')
@section('title', 'All Wind-Turbines')

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

			<a href="{{ route('windmill.create') }}" class="btn btn-success pull-right"><strong>Add New</strong> Wind-Turbine</a>
		</div>
		
		<div class="box-body">
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
							<td >{{ $windmill->id }}</td>
							<td ><a href="{{ route('windmill.show', $windmill->id) }}" class="text-info"><strong>{{ $windmill->manufacturer }}</strong></a></td>
							<td >{{ $windmill->modelno }}</td>
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