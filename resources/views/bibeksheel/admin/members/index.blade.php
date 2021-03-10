@extends('bibeksheel.layouts.admin')
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
                        <div style="margin-bottom: 10px;" class="row">
                            <div class="col-lg-12">
                                <a class="btn btn-success" href="{{ route('admin.members.create') }}">
                                    Add Member
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            @include('bibeksheel.layouts.alert')
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Member">
                    <thead>
                        <tr>
                            <th width="10">

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
                                {{ trans('cruds.member.fields.email') }}
                            </th>

                            <th>
                                {{ trans('cruds.member.fields.blood_group') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.mobile') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.disability') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.date_of_birth') }}
                            </th>

                            <th>
                                {{ trans('cruds.member.fields.current_country') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.group') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.occupation') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.area_of_efficiency') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.interested_department') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.availability') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.membership_fee') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.help_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.help_goods') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.help_money') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.currency') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.payment_type') }}
                            </th>

                            <th>
                                {{ trans('cruds.member.fields.is_paid') }}
                            </th>
                            <th>
                                {{ trans('cruds.member.fields.status') }}
                            </th>
                            <th>
                                Agree
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $key => $member)
                            <tr data-entry-id="{{ $member->id }}">
                                <td>

                                </td>
                                <td>
                                    @if ($member->membership_code == null)
                                       <h2 class="badge badge-danger">Not Approved</h2>
                                    @else
                                    {{ $member->membership_code ?? '' }}

                                    @endif
                                </td>

                                <td>
                                    {{ $member->name ?? '' }}
                                </td>
                                <td>
                                    {{ $member->nepali_name ?? '' }}
                                </td>
                                <td>
                                    {{ $member->email ?? '' }}
                                </td>

                                <td>
                                    {{ $member->blood_group ?? '' }}
                                </td>
                                <td>
                                    {{ $member->mobile ?? '' }}
                                </td>
                                <td>
                                    {{ App\Member::GENDER_RADIO[$member->gender] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Member::DISABILITY_SELECT[$member->disability] ?? '' }}
                                </td>
                                <td>
                                    {{ $member->date_of_birth ?? '' }} A.D.
                                </td>

                                <td>
                                    {{ $member->current_country ?? '' }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($member->group as $item)
                                            <li>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ $member->occupation ?? '' }}
                                </td>
                                <td>
                                    {{ $member->area_of_efficiency ?? '' }}
                                </td>
                                <td>
                                    <ul>
                                        @foreach ($member->interested_department as $item)
                                            <li>
                                                {{ $item }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{ App\Member::AVAILABILITY_SELECT[$member->availability] ?? '' }}
                                </td>
                                <td>
                                    {{ $member->membership_fee ?? '' }}
                                </td>
                                <td>
                                    {{ App\Member::HELP_TYPE_SELECT[$member->help_type] ?? '' }}
                                </td>
                                <td>
                                    {{ $member->help_goods ?? '' }}
                                </td>
                                <td>
                                    {{ $member->help_money ?? '' }}
                                </td>
                                <td>
                                    {{ $member->currency ?? '' }}
                                </td>
                                <td>
                                    {{ App\Member::PAYMENT_TYPE_SELECT[$member->payment_type] ?? '' }}
                                </td>

                                <td>
                                    {{ App\Member::IS_PAID_RADIO[$member->is_paid] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Member::STATUS_SELECT[$member->status] ?? '' }}
                                </td>

                                <td>
                                    @if ($member->is_agreed)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>

                                <td>

                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('admin.members.show', $member->id) }}">
                                            {{ trans('global.view') }}
                                        </a>

                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('admin.members.edit', $member->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>

                                        <form action="{{ route('admin.members.destroy', $member->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-sm btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>

                                        @if ($member->is_approved)
                                            <button class="btn btn-sm btn-success" disabled>
                                                Approved
                                            </button>
                                        @else
                                        <form action="{{ route('admin.members.approve', $member->id) }}"
                                            method="POST" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-sm btn-success"
                                                value="Approve">
                                        </form>
                                        @endif

                                        @if ($member->is_approved)
                                            <form action="{{ route('admin.members.reject', $member->id) }}"
                                            method="POST" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-sm btn-warning"
                                                value="Reject">
                                        </form>
                                        @else
                                            <button disabled class="btn btn-sm btn-warning">Rejected</button>
                                        @endif

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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('member_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.members.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            $('.datatable-Member:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
