@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('cruds.member.title_singular') }} {{ trans('global.list') }}
					</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">
					@can('member_create')
					<div style="margin-bottom: 10px;" class="row">
						<div class="col-lg-12">
							<a class="btn btn-success" href="{{ route("admin.members.choose.membership-code") }}">
								{{ trans('global.add') }} {{ trans('cruds.member.title_singular') }}
							</a>
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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Member">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.member.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.membership_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.nepali_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.current_country') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.is_paid') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $key => $member)
                        <tr data-entry-id="{{ $member->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $member->id ?? '' }}
                            </td>
                            <td>
                                {{ $member->membership_code ?? '' }}
                            </td>
                            <td>
                                {{ $member->name ?? '' }}
                            </td>
                            <td>
                                {{ $member->nepali_name ?? '' }}
                            </td>
                            <td>
                                {{ $member->area_code.' '.$member->mobile ?? '' }}
                            </td>
                            <td>
                                {{ App\Member::GENDER_RADIO[$member->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $member->date_of_birth ?? '' }} B.S.
                            </td>
                            <td>
                                {{ $member->current_country ?? '' }}
                            </td>
                            <td>
                                {{ App\Member::IS_PAID_RADIO[$member->is_paid] ?? '' }}
                            </td>
                            <td>
                                {{ App\Member::STATUS_SELECT[$member->status] ?? '' }}
                            </td>
                            <td>
                                @can('member_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.members.show', $member->membership_code) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('member_edit')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.members.approve.show', $member->membership_code) }}">
                                        {{ trans('global.view_details') }}
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Member:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection