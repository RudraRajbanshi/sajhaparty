@section('footertags')
@parent
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{URL::to('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::to('argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{URL::to('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{URL::to('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>

<!-- Optional JS -->
<!-- Argon JS -->
<script src="{{URL::to('argon/assets/js/argon.min5438.js?v=1.2.0')}}"></script>

<script src="{{ asset('js/main.js') }}"></script>
@endsection