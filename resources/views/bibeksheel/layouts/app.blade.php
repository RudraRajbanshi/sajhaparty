@include('bibeksheel.includes.app.headertags')
@include('bibeksheel.includes.app.footertags')
@include('bibeksheel.includes.app.topbar')
@include('bibeksheel.includes.app.footer')

<!--
=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{config('times.made_by')}}">
	<meta name="author" content="{{config('times.made_by')}}">
	<title>{{config('app.name')}}</title>

	@yield('headertags')
</head>

<body class="bg-default">
	@yield('topbar')

	<div class="main-content">
		@yield('content')
	</div>

	@yield('footer')
</body>
