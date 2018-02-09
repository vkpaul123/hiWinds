<!DOCTYPE html>
<html lang="en">
<head>
	@include('companyPages.layouts.headContent')
</head>
<body class="hold-transition skin-green sidebar-mini" id="body">
	<div class="wrapper">
		@include('companyPages.layouts.header')

		@include('companyPages.layouts.sidebar')

		<div class="content-wrapper">
			@section('body')
				@show
		</div>

		@include('companyPages.layouts.footer')
	</div>

	@include('companyPages.layouts.loadScripts')
</body>
</html>