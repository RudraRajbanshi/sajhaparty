@extends('bibeksheel.layouts.admin')
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

					<a class="btn btn-default" href="{{ route('admin.members.edit',$member->id)}}">
						{{trans('global.edit_member')}}
					</a>

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
                <a class="btn btn-default" href="{{ route('admin.members') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.member.fields.id') }}
                        </th>
                        <td>
                            {{ $member ->id }}
                        </td>
                    </tr> --}}

                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.name') }}
                        </th>
                        <td>
                            {{ $member->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.nepali_name') }}
                        </th>
                        <td>
                            {{ $member ->nepali_name }}
                        </td>
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
                        <th>
                            Highest Academic Qualification
                        </th>
                        <td>
                            {{ $member ->highest_academic_qualification }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Member::GENDER_RADIO[$member ->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.blood_group') }}
                        </th>
                        <td>
                            {{ $member ->blood_group ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.disability') }}
                        </th>
                        <td>
                            {{App\Member::DISABILITY_SELECT[$member ->disability] ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $member ->date_of_birth }} A.D
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.identity_type') }}
                        </th>
                        <td>
                            {{ App\Member::IDENTITY_TYPE_SELECT[$member ->identity_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.area_code') }}
                        </th>
                        <td>
                            {{ $member ->area_code ?? '' }}
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
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.occupation') }}
                        </th>
                        <td>
                            {{ $member ->occupation }}
                        </td>
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.permanent_address') }}
                        </th>
                        <td>
                            {{-- {{ App\Member::STATUS_SELECT[$member ->status] ?? '' }} --}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.province') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->province ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.district') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->district ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.municipality') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->municipality ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.ward_no') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->ward_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.toll_no') }}
                        </th>
                        <td>
                            {{ $member->address['permanent']->toll_no ?? '' }}
                        </td>
                    </tr>
                    @if (empty($member->address['temporary']->province) || $member->address['temporary']->province == null)

                    @else
                        <tr>
                        <th>
                            {{ trans('cruds.member.fields.temporary_address') }}
                        </th>
                        <td >
                            <div style="font-family: sans-serif;">

                                <p> Province: {{ $member->address['temporary']->province ?? '' }} </p>
                                <p> District: {{ $member->address['temporary']->district ?? '' }} </p>
                                <p> Municipality: {{ $member->address['temporary']->municipality ?? '' }} </p>
                                <p> Ward No: {{ $member->address['temporary']->ward_no ?? '' }} </p>
                                <p> Toll No: {{ $member->address['temporary']->toll_no ?? '' }} </p>
                            </div>
                        </td>
                    </tr>
                    @endif

                    @if (empty($member->address['foreign']->municipality) || $member->address['foreign']->municipality == null)

                    @else
                        <tr>
                        <th>
                            Foreign Address
                        </th>
                        <td>
                            <div style="font-family: sans-serif;">
                           <p> Country: {{ $member->address['foreign']->province ?? '' }} </p>
                           <p> Address: {{ $member->address['foreign']->district ?? '' }} </p>
                           <p> City: {{ $member->address['foreign']->municipality ?? '' }} </p>
                           <p> Phone: {{ $member->address['foreign']->ward_no ?? '' }} </p>
                           <p> Zip Code: {{ $member->address['foreign']->toll_no ?? '' }} </p>
                           </div>
                        </td>
                    </tr>
                    @endif

                    {{-- @includeIf('admin.members.someParts.temporary_address', [
                        'address' => $member->address['foreign'] ?? $member->address['temporary'] ?? '',
                        'type' => $member->address['foreign']? 'foreign' : 'temporary',

                        ]) --}}
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.remarks') }}
                        </th>
                        <td>
                            {{ $member ->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Identity Image
                        </th>
                        <td>
                            <img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$member ->identity_image }}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Photo for ID card
                        </th>
                        <td>
                            <img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$member ->photo_for_id_card }}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Membership Form
                        </th>
                        <td>
                            <img style = "height:120px; width:auto;' >" src = "{{ URL::to('/').'/uploads/'.$member ->membership_form }}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Is Approved
                        </th>
                        <td>
                            @if ($member->is_approved)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Membership Approved date
                        </th>
                        <td>
                            @if ($member->membership_approve_date == null)
                                Not Approved
                            @else
                                {{ $member->membership_approve_date }}
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th>
                            Membership Period
                        </th>
                        <td>
                            {{ $member->year_of_membership_period }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Form Filled at
                        </th>
                        <td>
                            {{ $member->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Agree
                        </th>
                        <td>
                            @if ($member ->is_agreed)
                                Yes
                            @else
                                No
                            @endif

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
		<div class="form-group">
			<a class="btn btn-default" href="{{ route('admin.members') }}">
				{{ trans('global.back_to_list') }}
			</a>
		</div>
    </div>
</div>



@endsection
