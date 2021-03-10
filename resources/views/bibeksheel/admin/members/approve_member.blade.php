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
					{{ trans('global.created_by').': ' }} <strong> {{$member->approveStatus->approvedBy->name }} </strong>
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
            <div class="row">
                <div class="col-auto mr-auto mb-2">
                    <a class="btn btn-primary" href="{{ route('admin.members.edit',$member->membership_code)}}">
                        {{trans('global.edit_member')}}
                    </a>
                </div>
                <div class="col-auto">
                    <form action="{{ route('admin.members.approve.confirm') }}" method="post">
                        @csrf
                        <input type="hidden" name="membership_code" value="{{ $member->membership_code }}">
                        <button type="submit" class="btn btn-success"> {{ trans('global.approve') }} </button>
                    </form>
                </div>
                <div class="col-auto ml-auto mb-2">
                    <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
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
                        <th>
                            {{ trans('cruds.member.fields.membership_code') }}
                        </th>
                        <td>
                            {{ $member ->membership_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.name') }}
                        </th>
                        <td>
                            {{ $member ->name }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.email') }}
                        </th>
                        <td>
                            {{ $member ->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.mobile') }}
                        </th>
                        <td>
                            {{ $member ->mobile }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Member::GENDER_RADIO[$member ->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.disability') }}
                        </th>
                        <td>
                            {{App\Member::DISABILITY_SELECT[$member ->disability ?? '']}}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $member ->date_of_birth }} B.S
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.identity_type') }}
                        </th>
                        <td>
                            {{ App\Member::IDENTITY_TYPE_SELECT[$member ->identity_type] ?? '' }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.identity_number') }}
                        </th>
                        <td>
                            {{ $member ->identity_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.current_country') }}
                        </th>
                        <td>
                            {{ $member ->current_country ?? '' }}
                        </td>
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
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.occupation') }}
                        </th>
                        <td>
                            {{ $member ->occupation }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.area_of_efficiency') }}
                        </th>
                        <td>
                            {{ $member ->area_of_efficiency }}
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
                        <th>
                            {{ trans('cruds.member.fields.availability') }}
                        </th>
                        <td>
                            {{ App\Member::AVAILABILITY_SELECT[$member ->availability] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.membership_fee') }}
                        </th>
                        <td>
                            {{ $member ->membership_fee }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.help_type') }}
                        </th>
                        <td>
                            {{ App\Member::HELP_TYPE_SELECT[$member ->help_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.help_goods') }}
                        </th>
                        <td>
                            {{ $member ->help_goods }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.help_money') }}
                        </th>
                        <td>
                            {{ $member ->help_money }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.currency') }}
                        </th>
                        <td>
                            {{ $member ->currency ?? '' }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Member::PAYMENT_TYPE_SELECT[$member ->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.payment_confirmation_code') }}
                        </th>
                        <td>
                            {{ $member ->payment_confirmation_code ?? ''}}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.is_paid') }}
                        </th>
                        <td>
                            {{ App\Member::IS_PAID_RADIO[$member ->is_paid] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.status') }}
                        </th>
                        <td>
                            {{ App\Member::STATUS_SELECT[$member ->status] ?? '' }}
                        </td>
                        <th>
                            {{ trans('cruds.member.fields.remarks') }}
                        </th>
                        <td>
                            {{ $member ->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2">
                            <h5>
                                {{ trans('cruds.member.fields.permanent_address') }}
                            </h5>
                        </th>
                        <th colspan="2">
                            <h5>
                                {{ trans('cruds.member.fields.temporary_address') }}
                            </h5>
                        </th>
                    </tr>
                    <tr>
                        <th>Address Type</th>
                        <td>{{ strtoupper($member->address['permanent']->address_type) }}</td>
                        <th>Address Type</th>
                        <td>{{ strtoupper(($member->address['temporary']??$member->address['foreign'])->address_type) }}</td>
                    </tr>
                    <tr>
                        <th>Province</th>
                        <td>{{ $member->address['permanent']->province }}</td>
                        <th>Province</th>
                        <td>{{ ($member->address['temporary']??$member->address['foreign'])->province }}</td>
                    </tr>
                    <tr>
                        <th>District</th>
                        <td>{{ $member->address['permanent']->district }}</td>
                        <th>District</th>
                        <td>{{ ($member->address['temporary']??$member->address['foreign'])->district }}</td>
                    </tr>
                    <tr>
                        <th>Municipality</th>
                        <td>{{ $member->address['permanent']->municipality }}</td>
                        <th>Municipality</th>
                        <td>{{ ($member->address['temporary']??$member->address['foreign'])->municipality }}</td>
                    </tr>
                    <tr>
                        <th>Ward Number</th>
                        <td>{{ $member->address['permanent']->ward_no }}</td>
                        <th>Ward Number</th>
                        <td>{{ ($member->address['temporary']??$member->address['foreign'])->ward_no }}</td>
                    </tr>
                    <tr>
                        <th>Toll Number</th>
                        <td>{{ $member->address['permanent']->toll_no }}</td>
                        <th>Toll Number</th>
                        <td>{{ ($member->address['temporary']??$member->address['foreign'])->toll_no }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-auto mr-auto">
                    <a class="btn btn-primary" href="{{ route('admin.members.edit',$member->membership_code)}}">
                        {{trans('global.edit_member')}}
                    </a>
                </div>
                <div class="col-auto">
                    <form action="{{ route('admin.members.approve.confirm') }}" method="post">
                        @csrf
                        <input type="hidden" name="membership_code" value="{{ $member->membership_code }}">
                        <button type="submit" class="btn btn-success"> {{ trans('global.approve') }} </button>
                    </form>
                </div>
                <div class="col-auto ml-auto">
                    <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
