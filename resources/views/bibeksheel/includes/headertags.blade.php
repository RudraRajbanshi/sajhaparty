@section('headertags')

	@parent
	<!-- Favicon -->
	<link rel="icon" href="{{URL::to('argon/assets/img/brand/favicon.png')}}" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
	<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
	<!-- Page plugins -->
	<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/select2/dist/css/select2.min.css')}}">
	<!-- Argon CSS -->
	<link rel="stylesheet" href="{{URL::to('argon/assets/css/argon.min5438.css?v=1.2.0')}}" type="text/css">
	<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">

	<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
@endsection