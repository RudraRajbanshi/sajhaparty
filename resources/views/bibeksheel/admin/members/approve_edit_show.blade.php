@extends('argon.layouts.admin')
@section('header')
<!-- Header -->
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						{{ trans('global.show') }} {{ trans('cruds.member.title') }}
					</h6>
				</div>
				<div class="col-lg-6 col-5 text-right">

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
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.id') }}
                        </th>
                        <td>
                            {{ $member ->id }}
                        </td>
                        <td>
                            {{ $member ->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.membership_code') }}
                        </th>
                        <td>
                            {{ $member ->membership_code }}
                        </td>
                        <td>
                            {{ $editData->member->membership_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.name') }}
                        </th>
                        <td>
                            {{ $member ->name }}
                        </td>
                        <td>
                            {{ $editData->member->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.email') }}
                        </th>
                        <td>
                            {{ $member ->email }}
                        </td>
                        <td>
                            {{ $editData->member->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mobile') }}
                        </th>
                        <td>
                            {{ $member ->mobile }}
                        </td>
                        <td>
                            {{ $editData->member->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Member::GENDER_RADIO[$member ->gender] ?? '' }}
                        </td>
                        <td>
                            {{ App\Member::GENDER_RADIO[$editData->member->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.disability') }}
                        </th>
                        <td>
                            {{App\Member::DISABILITY_SELECT[$member ->disability ?? '']}}
                        </td>
                        <td>
                            {{App\Member::DISABILITY_SELECT[$editData->member->disability ?? '']}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $member ->date_of_birth }} B.S
                        </td>
                        <td>
                            {{ $editData->member->date_of_birth }} B.S
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.identity_type') }}
                        </th>
                        <td>
                            {{ App\Member::IDENTITY_TYPE_SELECT[$member ->identity_type] ?? '' }}
                        </td>
                        <td>
                            {{ App\Member::IDENTITY_TYPE_SELECT[$editData->member->identity_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.identity_number') }}
                        </th>
                        <td>
                            {{ $member ->identity_number }}
                        </td>
                        <td>
                            {{ $editData->member->identity_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.current_country') }}
                        </th>
                        <td>
                            {{ $member ->current_country ?? '' }}
                        </td>
                        <td>
                            {{ $editData->member->current_country ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.group') }}
                        </th>
                        <td>
                            <ul>
                                @foreach ($member ->group as $item)
                                    <li>
                                        {{$item}}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($editData->member->group as $item)
                                    <li>
                                        {{$item}}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.occupation') }}
                        </th>
                        <td>
                            {{ $member ->occupation }}
                        </td>
                        <td>
                            {{ $editData->member->occupation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.area_of_efficiency') }}
                        </th>
                        <td>
                            {{ $member ->area_of_efficiency }}
                        </td>
                        <td>
                            {{ $editData->member->area_of_efficiency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.interested_department') }}
                        </th>
                        <td>
                            <ul>
                                @foreach ($member ->interested_department as $item)
                                    <li>
                                        {{$item}}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($editData->member->interested_department as $item)
                                    <li>
                                        {{$item}}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.availability') }}
                        </th>
                        <td>
                            {{ App\Member::AVAILABILITY_SELECT[$member ->availability] ?? '' }}
                        </td>
                        <td>
                            {{ App\Member::AVAILABILITY_SELECT[$editData->member->availability] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.membership_fee') }}
                        </th>
                        <td>
                            {{ $member ->membership_fee }}
                        </td>
                        <td>
                            {{ $editData->member->membership_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.help_type') }}
                        </th>
                        <td>
                            {{ App\Member::HELP_TYPE_SELECT[$member ->help_type] ?? '' }}
                        </td>
                        <td>
                            {{ App\Member::HELP_TYPE_SELECT[$editData->member->help_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.help_goods') }}
                        </th>
                        <td>
                            {{ $member ->help_goods }}
                        </td>
                        <td>
                            {{ $editData->member->help_goods }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.help_money') }}
                        </th>
                        <td>
                            {{ $member ->help_money }}
                        </td>
                        <td>
                            {{ $editData->member->help_money }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.currency') }}
                        </th>
                        <td>
                            {{ $member ->currency ?? '' }}
                        </td>
                        <td>
                            {{ $editData->member->currency ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Member::PAYMENT_TYPE_SELECT[$member ->payment_type] ?? '' }}
                        </td>
                        <td>
                            {{ App\Member::PAYMENT_TYPE_SELECT[$editData->member->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.payment_confirmation_code') }}
                        </th>
                        <td>
                            {{ $member ->payment_confirmation_code ?? ''}}
                        </td>
                        <td>
                            {{ $editData->member->payment_confirmation_code ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.is_paid') }}
                        </th>
                        <td>
                            {{ App\Member::IS_PAID_RADIO[$member ->is_paid] ?? '' }}
                        </td>
                        <td>
                            {{ App\Member::IS_PAID_RADIO[$editData->member->is_paid] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.status') }}
                        </th>
                        <td>
                            {{ App\Member::STATUS_SELECT[$member ->status] ?? '' }}
                        </td>
                        <td>
                            {{ App\Member::STATUS_SELECT[$editData->member->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.permanent_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.permanent_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.permanent_address') }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.province') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->province ?? '' }}
                        </td>
                        <td>
                            {{ $editData->permanent_address->province ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.district') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->district ?? '' }}
                        </td>
                        <td>
                            {{ $editData->permanent_address->district ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.municipality') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->municipality ?? '' }}
                        </td>
                        <td>
                            {{ $editData->permanent_address->municipality ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.ward_no') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->ward_no ?? '' }}
                        </td>
                        <td>
                            {{ $editData->permanent_address->ward_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.toll_no') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->toll_no ?? '' }}
                        </td>
                        <td>
                            {{ $editData->permanent_address->toll_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.temporary_address') }}
                        </th>
                       <th>
                            {{ trans('cruds.member.fields.temporary_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.member.fields.temporary_address') }}
                        </th>
                    </tr>
                    @includeIf('admin.members.someParts.temporary_address_approve_show', [
                        'address' => $member->address['foreign'] ?? $member->address['temporary'],
                        'addressType' => $member->address['foreign']? 'foreign' : 'temporary',
                        'editAddress' => $editData->temporary_address,
                        'editAddressType' => $editData->member->current_country != 'Nepal' ? 'foreign' : 'temporary'
                        ])
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.remarks') }}
                        </th>
                        <td>
                            {{ $member ->remarks }}
                        </td>
                        <td>
                            {{ $editData->member->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <div class="form-group">
                <form method="POST" action={{ route('admin.members.edit.approve.store', $member->membership_code)}}>
                    @csrf
                    <button type="submit">
                        {{trans('global.approve')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
