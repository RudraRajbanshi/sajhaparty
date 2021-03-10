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
	<script src="{{URL::to('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/moment.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/bootstrap-datetimepicker.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<!-- Argon JS -->
	<script src="{{URL::to('argon/assets/js/argon.min5438.js?v=1.2.0')}}"></script>

	{{-- DataTables JS --}}
	<script src="{{URL::to('argon/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
	<script src="{{URL::to('argon/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

	<script src="{{ asset('js/main.js') }}"></script>
@endsection
