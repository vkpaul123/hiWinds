<!DOCTYPE html>
<html lang="en">
<head>
	@include('welcomePage.layouts.headContent')
</head>
<body id="body">
	<!-- preloader -->
	<div id="preloader">
		<img src="{{ @asset('rawThemes/brandi/img/preloader.gif') }}" alt="Preloader">
	</div>
	<!-- end preloader -->

	@include('welcomePage.layouts.fixedNavigation')
	

	{{-- BODY --}}
	@section('body')
		@show

	@include('welcomePage.layouts.footerPlugins')

	@include('welcomePage.layouts.pageScripts')
</body>
</html>