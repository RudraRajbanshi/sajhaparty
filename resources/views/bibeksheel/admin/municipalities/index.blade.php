@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('cruds.municipality.title_singular') }} {{ trans('global.list') }}
					</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
					@can('municipality_create')
					<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" href="{{ route("admin.municipalities.create") }}">
								{{ trans('global.add') }} {{ trans('cruds.municipality.title_singular') }}
							</a>
							<button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
								{{ trans('global.app_csvImport') }}
							</button>
							@include('csvImport.modal', ['model' => 'Municipality', 'route' => 'admin.municipalities.parseCsvImport'])
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

    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Municipality">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.municipality.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.municipality.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.municipality.fields.district') }}
                    </th>
                    <th>
                        {{ trans('cruds.municipality.fields.wards') }}
                    </th>
                    <th>
                        {{ trans('cruds.municipality.fields.municipality_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.municipality.fields.slug') }}
                    </th>
                    <th>
                        {{ trans('cruds.municipality.fields.remarks') }}
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
@can('municipality_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.municipalities.massDestroy') }}",
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
    ajax: "{{ route('admin.municipalities.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'district_name', name: 'district.name' },
        { data: 'wards', name: 'wards' },
        { data: 'municipality_code', name: 'municipality_code' },
        { data: 'slug', name: 'slug' },
        { data: 'remarks', name: 'remarks' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-Municipality').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection