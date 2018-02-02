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
									<div id="interactive-power" style="height: 300px;"></div>
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
										<div id="interactive-current" style="height: 300px"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="box box-success">
									<div class="box-header with-border">
										<h4 class="text-success">Voltage</h4>
									</div>
									<div class="panel-body">
										<div id="interactive-voltage" style="height: 300px"></div>
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
										<div id="interactive-temperature" style="height: 300px"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="box box-success">
									<div class="box-header with-border">
										<h4 class="text-success">Humity</h4>
									</div>
									<div class="panel-body">
										<div id="interactive-humidity" style="height: 300px"></div>
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
	
	<!-- FLOT CHARTS -->
	<script src="{{ asset('rawThemes/adminLTE/bower_components/Flot/jquery.flot.js') }}"></script>
	<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
	<script src="{{ asset('rawThemes/adminLTE/bower_components/Flot/jquery.flot.resize.js') }}"></script>
	<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
	<script src="{{ asset('rawThemes/adminLTE/bower_components/Flot/jquery.flot.categories.js') }}"></script>
	{{-- EXTRA SCRIPTS --}}

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
	  
	    /*
         * Flot Interactive Chart
         * -----------------------
         */
        // We use an inline data source in the example, usually data would
        // be fetched from a server
        var data = [], totalPoints = 100

        function getRandomData() {

          if (data.length > 0)
            data = data.slice(1)

          // Do a random walk
          while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y    = prev + Math.random() * 10 - 5

            if (y < 0) {
              y = 0
            } else if (y > 100) {
              y = 100
            }

            data.push(y)
          }

          // Zip the generated y values with the x values
          var res = []
          for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
          }

          return res
        }

        var interactive_plot_power = $.plot('#interactive-power', [getRandomData()], {
          grid  : {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor  : '#f3f3f3'
          },
          series: {
            shadowSize: 0, // Drawing is faster without shadows
            color     : '#3c8dbc'
          },
          lines : {
            fill : true, //Converts the line chart to area chart
            color: '#3c8dbc'
          },
          yaxis : {
            min : 0,
            max : 100,
            show: true
          },
          xaxis : {
            show: true
          }
        })

        var interactive_plot_current = $.plot('#interactive-current', [getRandomData()], {
          grid  : {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor  : '#f3f3f3'
          },
          series: {
            shadowSize: 0, // Drawing is faster without shadows
            color     : '#3c8dbc'
          },
          lines : {
            fill : true, //Converts the line chart to area chart
            color: '#3c8dbc'
          },
          yaxis : {
            min : 0,
            max : 100,
            show: true
          },
          xaxis : {
            show: true
          }
        })

        var interactive_plot_voltage = $.plot('#interactive-voltage', [getRandomData()], {
          grid  : {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor  : '#f3f3f3'
          },
          series: {
            shadowSize: 0, // Drawing is faster without shadows
            color     : '#3c8dbc'
          },
          lines : {
            fill : true, //Converts the line chart to area chart
            color: '#3c8dbc'
          },
          yaxis : {
            min : 0,
            max : 100,
            show: true
          },
          xaxis : {
            show: true
          }
        })

        var interactive_plot_temperature = $.plot('#interactive-temperature', [getRandomData()], {
          grid  : {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor  : '#f3f3f3'
          },
          series: {
            shadowSize: 0, // Drawing is faster without shadows
            color     : '#3c8dbc'
          },
          lines : {
            fill : true, //Converts the line chart to area chart
            color: '#3c8dbc'
          },
          yaxis : {
            min : 0,
            max : 100,
            show: true
          },
          xaxis : {
            show: true
          }
        })

        var interactive_plot_humidity = $.plot('#interactive-humidity', [getRandomData()], {
          grid  : {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor  : '#f3f3f3'
          },
          series: {
            shadowSize: 0, // Drawing is faster without shadows
            color     : '#3c8dbc'
          },
          lines : {
            fill : true, //Converts the line chart to area chart
            color: '#3c8dbc'
          },
          yaxis : {
            min : 0,
            max : 100,
            show: true
          },
          xaxis : {
            show: true
          }
        })

        var updateInterval = 500 //Fetch data ever x milliseconds
        var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
        function update() {

          interactive_plot_power.setData([getRandomData()])
          interactive_plot_current.setData([getRandomData()])
          interactive_plot_voltage.setData([getRandomData()])
          interactive_plot_temperature.setData([getRandomData()])
          interactive_plot_humidity.setData([getRandomData()])

          // Since the axes don't change, we don't need to call plot.setupGrid()
          interactive_plot_power.draw()
          interactive_plot_current.draw()
          interactive_plot_voltage.draw()
          interactive_plot_temperature.draw()
          interactive_plot_humidity.draw()

          if (realtime === 'on')
            setTimeout(update, updateInterval)
        }

        //INITIALIZE REALTIME DATA FETCHING
        if (realtime === 'on') {
          update()
        }
        //REALTIME TOGGLE
        $('#realtime .btn').click(function () {
          if ($(this).data('toggle') === 'on') {
            realtime = 'on'
          }
          else {
            realtime = 'off'
          }
          update()
        })
        /*
         * END INTERACTIVE CHART
         */
	  })
	</script>
@endsection