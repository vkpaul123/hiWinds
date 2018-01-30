<!DOCTYPE html>
<html lang="en">
<head>
	@include('adminPages.layouts.headContent')
</head>
<body class="hold-transition skin-red sidebar-mini">
	<div class="wrapper">
		@include('adminPages.layouts.header')

		@include('adminPages.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>

		@include('adminPages.layouts.footer')
	</div>

	@include('adminPages.layouts.loadScripts')
</body>
</html>