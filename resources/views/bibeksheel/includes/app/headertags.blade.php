@section('headertags')

@parent
<!-- Favicon -->
<link rel="icon" href="{{URL::to('argon/assets/img/brand/favicon.png')}}" type="image/png">
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
<!-- Icons -->
<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::to('argon/assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css')}}"
	type="text/css">
<!-- Page plugins -->
<!-- Argon CSS -->
<link rel="stylesheet" href="{{URL::to('argon/assets/css/argon.min5438.css?v=1.2.0')}}" type="text/css">

<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
@endsection