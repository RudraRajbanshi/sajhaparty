@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('cruds.province.title_singular') }} {{ trans('global.list') }}
					</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
					@can('province_create')
					<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" href="{{ route("admin.provinces.create") }}">
								{{ trans('global.add') }} {{ trans('cruds.province.title_singular') }}
							</a>
							<button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
								{{ trans('global.app_csvImport') }}
							</button>
							@include('csvImport.modal', ['model' => 'Province', 'route' => 'admin.provinces.parseCsvImport'])
						</div>
					</div>
					@endcan
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
		@parent
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Province">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.province.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.province.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.province.fields.province_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.province.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.province.fields.remarks') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('province_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.provinces.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.provinces.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'province_code', name: 'province_code' },
{ data: 'status', name: 'status' },
{ data: 'remarks', name: 'remarks' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    createdRow:(row, data, dataIndex, cells)=> {
        $(row).css('background-color', data.status_color)
    },
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-Province').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection