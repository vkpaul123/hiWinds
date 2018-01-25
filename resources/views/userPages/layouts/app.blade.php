<!DOCTYPE html>
<html lang="en">
<head>
	@include('userPages.layouts.headContent')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		@include('userPages.layouts.header')

		@include('userPages.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>

		@include('userPages.layouts.footer')
	</div>

	@include('userPages.layouts.loadScripts')
</body>
</html>