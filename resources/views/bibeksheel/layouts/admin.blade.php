@include('bibeksheel.includes.headertags')
@include('bibeksheel.includes.footertags')
@include('bibeksheel.partials.menu')
@include('bibeksheel.includes.navbar')
@include('bibeksheel.includes.footer')

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
		{{-- start of headertags --}}
		@yield('headertags')
		{{-- end of headertags --}}

	</head>

	<body>
		{{-- start of sidebar --}}
		@yield('sidebar')
		{{-- end of sidebar --}}
		<div class="main-content" id="panel">
			{{-- start of topbar--contains search and login head --}}
			@yield('topbar')
			{{-- end of topbar --}}
			{{-- start of header--page dependent -- contains topic/heading of the page--on same file of page where the layout is extended --}}
			@yield('header')
			{{-- end of header --}}
			{{-- container for content --}}
			<div class="container-fluid mt--6">
				@section('content')
					@include('bibeksheel.partials.response')
				@endsection
				{{-- start of main content-- page dependent --}}
				@yield('content')
				{{-- end of content --}}
				{{-- start of footer --}}
				@yield('footer')
				{{-- end of footer --}}
			</div>
			{{-- end of container --}}
		</div>
		{{-- start of footer tags --}}
		@yield('footertags')
		{{-- end of footer tags --}}

		<script>
			$(function() {
				let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
				let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
				let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
				let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
				let printButtonTrans = '{{ trans('global.datatables.print') }}'
				let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
				let selectAllButtonTrans = '{{ trans('global.select_all') }}'
				let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

				let languages = {
					'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
				};

				$.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
				$.extend(true, $.fn.dataTable.defaults, {
					language: {
					url: languages["{{ app()->getLocale() }}"]
					},
					columnDefs: [{
						orderable: false,
						className: 'select-checkbox',
						targets: 0
					}, {
						orderable: false,
						searchable: false,
						targets: -1
					}],
					select: {
					style:    'multi+shift',
					selector: 'td:first-child'
					},
					order: [],
					scrollX: true,
					pageLength: 100,
					dom: 'lBfrtip<"actions">',
					buttons: [
					{
						extend: 'selectAll',
						className: 'btn-primary',
						text: selectAllButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'selectNone',
						className: 'btn-primary',
						text: selectNoneButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'copy',
						className: 'btn-default',
						text: copyButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'csv',
						className: 'btn-default',
						text: csvButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'excel',
						className: 'btn-default',
						text: excelButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'pdf',
						className: 'btn-default',
						text: pdfButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'print',
						className: 'btn-default',
						text: printButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					// {
					// 	extend: 'colvis',
					// 	className: 'btn-default',
					// 	text: colvisButtonTrans,
					// 	exportOptions: {
					// 	columns: ':visible'
					// 	}
					// }
					]
				});

				$.fn.dataTable.ext.classes.sPageButton = '';
				});
		</script>
		@yield('scripts')
	</body>
</html>
