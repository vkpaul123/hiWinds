@extends('companyPages.layouts.app')
@section('title', 'View Wind-Turbine')
@section('sideBarActivator_WindTurbines', 'class=active')

@section('pageSpecificHeadContent')
	<link rel="stylesheet" href="{{ asset('rawThemes/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('body')

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<strong class="text-success">View Wind-Turbine Log</strong>
		<small>log of the wind-turbine</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li>Wind-Turbine</li>
		<li class="active">Show</li>
	</ol>
</section>

<section class="content">
	<div class="box box-success">
		<div class="box-body">
			<div class="row">
				<div class="col-lg-3 col-xs-5">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>{{ $id }}</h3>
		            </div>
		            <div class="icon">
		              <i class="fa fa-key" style="padding-top: 10px;"></i>
		            </div>
		            <span class="small-box-footer">Wind-Turbine ID</span>
		          </div>
		        </div>
		        <div class="col-md-3 col-xs-7 pull-right">
		        	<a href="{{ route('windmill.show', $id) }}" class="btn btn-block btn-info">Back</a>
		        	<a href="" class="btn btn-block btn-primary btn-lg"><strong>Download Log</strong></a>
		        </div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="box">
				<div class="box-header with-border">
					<h3>Graphs</h3>
				</div>

				<div class="box-body">
					<div class="container-fluid">
						<div class="row">
							<div class="box box-success">
								<div class="box-header with-border">
									<h4 class="text-success">Power</h4>
								</div>
								<div class="panel-body">
									<div class="jumbotron">
										<div class="h2">Add Graph</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="box box-success">
									<div class="box-header with-border">
										<h4 class="text-success">Current</h4>
									</div>
									<div class="panel-body">
										<div class="jumbotron">
											<div class="h2">Add Graph</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="box box-success">
									<div class="box-header with-border">
										<h4 class="text-success">Voltage</h4>
									</div>
									<div class="panel-body">
										<div class="jumbotron">
											<div class="h2">Add Graph</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="box box-success">
									<div class="box-header with-border">
										<h4 class="text-success">Temperature</h4>
									</div>
									<div class="panel-body">
										<div class="jumbotron">
											<div class="h2">Add Graph</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="box box-success">
									<div class="box-header with-border">
										<h4 class="text-success">Humity</h4>
									</div>
									<div class="panel-body">
										<div class="jumbotron">
											<div class="h2">Add Graph</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="box">
				<div class="box-header with-border">
					<h3>Raw Data Log</h3>
				</div>

				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover" id="sensorLog">
						<thead>
							<tr>
								<th>Current (A)</th>
								<th>Voltage (V)</th>
								<th>Power (W)</th>
								<th>Temprature (&degC)</th>
								<th>Humidity (%)</th>
								<th>Timestamp</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($sensors as $sensor)
							
							<tr>
								<td>{{ $sensor->current }}</td>
								<td>{{ $sensor->oltage }}</td>
								<td>{{ $sensor->power }}</td>
								<td>{{ $sensor->temprature }}</td>
								<td>{{ $sensor->humidity }}</td>
								<td>{{ $sensor->created_at }}</td>
							</tr>
							
							@endforeach
						</tbody>

						<tfoot>
							<tr>
								<th>Current (A)</th>
								<th>Voltage (V)</th>
								<th>Power (W)</th>
								<th>Temprature (&degC)</th>
								<th>Humidity (%)</th>
								<th>Timestamp</th>
							</tr>
						</tfoot>
					</table>
				</div>
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
	    $('#sensorLog').DataTable({
	      'paging'      : true,
	      'lengthChange': true,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : true
	    })
	  })
	</script>
@endsection