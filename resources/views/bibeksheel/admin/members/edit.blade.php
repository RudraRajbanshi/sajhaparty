@extends('bibeksheel.layouts.admin')
@section('header')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">
                            {{ trans('global.edit') }} {{ trans('cruds.member.title_singular') }}
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
            <form method="POST" action="{{ route('admin.member.update',$member->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <div class="form-group">
                    <label class="required"
                        for="membership_code">{{ trans('cruds.member.fields.membership_code') }}</label>
                    <input class="form-control {{ $errors->has('membership_code') ? 'is-invalid' : '' }}" readonly
                        type="text" name="membership_code" id="membership_code"
                        value="{{ old('membership_code', $member->membership_code) }}" required>
                    @if ($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.member.fields.membership_code_helper') }}</span>
                </div> --}}
                <div class="form-row">
                    <legend><u> Personal Details </u></legend>
                    <div class="form-group col-4">
                        <label for="name">{{ trans('cruds.member.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                            id="name" value="{{ old('name', $member->name) }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="name">{{ trans('cruds.member.fields.nepali_name') }}(Nepali)</label>
                        <input class="form-control {{ $errors->has('nepali_name') ? 'is-invalid' : '' }}" type="text"
                            name="nepali_name" id="nepali_name" value="{{ old('nepali_name', $member->nepali_name) }}">
                        @error('nepali_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.nepali_name_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="email">{{ trans('cruds.member.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                            name="email" id="email" value="{{ old('email', $member->email) }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.email_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="mobile">{{ trans('cruds.member.fields.mobile') }}</label>
                        <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text"
                            name="mobile" id="mobile" value="{{ old('mobile', $member->mobile) }}">
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.mobile_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="date_of_birth">{{ trans('cruds.member.fields.date_of_birth') }}</label>
                        <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                            type="date" name="date_of_birth" id="date_of_birth"
                            value="{{ old('date_of_birth', $member->date_of_birth) }}">
                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.date_of_birth_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label>Highest Academic Qualification</label>
                        <select
                            class="form-control {{ $errors->has('highest_academic_qualification') ? 'is-invalid' : '' }}"
                            name="highest_academic_qualification" id="highest_academic_qualification">
                            <option value disabled
                                {{ old('highest_academic_qualification', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::HIGHEST_ACADEMIC_QUALIFICATION as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('highest_academic_qualification', $member->highest_academic_qualification) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @error('highest_academic_qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.current_country') }}</label>
                        <select class="form-control {{ $errors->has('current_country') ? 'is-invalid' : '' }}"
                            name="current_country" id="current_country">
                            <option value disabled {{ old('current_country', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::CURRENT_COUNTRY_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('current_country', $member->current_country) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @error('current_country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.current_country_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="name">{{ trans('cruds.member.fields.area_code') }}</label>
                        <input class="form-control {{ $errors->has('area_code') ? 'is-invalid' : '' }}" type="text"
                            name="area_code" id="area_code" value="{{ old('area_code', $member->area_code) }}">
                        @error('area_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.blood_group') }}</label>
                        <select class="form-control {{ $errors->has('blood_group') ? 'is-invalid' : '' }}"
                            name="blood_group" id="blood_group">
                            <option value disabled {{ old('blood_group', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::BLOOD_GROUPS_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('blood_group', $member->blood_group) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @error('blood_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>{{ trans('cruds.member.fields.gender') }}:</label>
                        @foreach (App\Member::GENDER_RADIO as $key => $label)
                            <div class="form-check form-check-inline {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender"
                                    value="{{ $key }}"
                                    {{ old('gender', $member->gender) === (string) $key ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="gender_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.gender_helper') }}</span>
                    </div>
                    <div class="form-group col-4">

                            <label>{{ trans('cruds.member.fields.disability') }}:</label>

                        @foreach (App\Member::DISABILITY_SELECT as $key => $label)
                            <div
                                class="form-check form-check-inline {{ $errors->has('disability') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="disability{{ $key }}"
                                    name="disability" value="{{ $key }}"
                                    {{ old('disability', $member->disability) === (string) $key ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="disability_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @error('disability')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <legend><u> Permanent Address </u></legend>
                    <div class="form-group col-4">
                        <label>Province</label>
                        <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province"
                            id="province">
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('province', $member->addresses[0]->province_id) == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}</option>

                            @endforeach
                        </select>
                        @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label>District</label>
                        <select class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district"
                            id="district">
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ old('district', $member->addresses[0]->district_id) == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}</option>

                            @endforeach

                        </select>
                        @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label>Municipality</label>
                        <select class="form-control {{ $errors->has('municipality') ? 'is-invalid' : '' }}"
                            name="municipality" id="municipality">
                            @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->id }}"
                                    {{ old('municipality', $member->addresses[0]->municipality_id) == $municipality->id ? 'selected' : '' }}>
                                    {{ $municipality->municipality_code }}
                                </option>
                            @endforeach
                        </select>
                        @error('municipality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="ward_number">Ward Number</label>
                        <input class="form-control {{ $errors->has('ward_no') ? 'is-invalid' : '' }}" type="text"
                            name="ward_no" id="ward_no" value="{{ old('ward_no', $member->addresses[0]->ward_no) }}">
                        @error('ward_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="toll">Toll</label>
                        <input class="form-control {{ $errors->has('toll_no') ? 'is-invalid' : '' }}" type="text"
                            name="toll_no" id="toll_no" value="{{ old('toll_no', $member->addresses[0]->toll_no) }}">
                        @error('toll_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-12">
                        <label>Have temporary address?</label>
                        <div
                            class="form-check form-check-inline {{ $errors->has('has_temporary_address') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="has_temporary_address_true"
                                name="has_temporary_address" value="Yes"
                                {{ $member->addresses[1]->province_id != '' ? 'checked' : '' }}>
                            <label class="form-check-label" for="">Yes</label>
                        </div>
                        <div
                            class="form-check form-check-inline {{ $errors->has('has_temporary_address') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="has_temporary_address_false"
                                name="has_temporary_address" value="No"
                                {{ $member->addresses[1]->province_id == '' ? 'checked' : '' }}>
                            <label class="form-check-label" for="">No</label>
                        </div>

                    </div>

                    <div class="form-row" id="temporary_address_modal" aria-hidden="true">
                        <legend><u> Temporary Address </u></legend>
                        <div class="form-group col-4">
                            <label>Province</label>
                            <select class="form-control {{ $errors->has('temporary_province') ? 'is-invalid' : '' }}"
                                name="temporary_province" id="temporary_province">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}"
                                        {{ old('temporary_province', $member->addresses[1]->province_id) == $province->id ? 'selected' : '' }}>
                                        {{ $province->name }}</option>

                                @endforeach
                            </select>
                            @error('temporary_province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>District</label>
                            <select class="form-control {{ $errors->has('temporary_district') ? 'is-invalid' : '' }}"
                                name="temporary_district" id="temporary_district">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}"
                                        {{ old('temporary_district', $member->addresses[1]->district_id) == $district->id ? 'selected' : '' }}>
                                        {{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('temporary_district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Municipality</label>
                            <select
                                class="form-control {{ $errors->has('temporary_municipality') ? 'is-invalid' : '' }}"
                                name="temporary_municipality" id="temporary_municipality">
                                @foreach ($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}"
                                        {{ old('temporary_municipality', $member->addresses[1]->municipality_id) == $municipality->id ? 'selected' : '' }}>
                                        {{ $municipality->municipality_code }}
                                    </option>
                                @endforeach
                            </select>
                            @error('temporary_municipality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="ward_number">Ward Number</label>
                            <input class="form-control {{ $errors->has('temporary_ward_no') ? 'is-invalid' : '' }}"
                                type="text" name="temporary_ward_no" id="temporary_ward_no"
                                value="{{ old('temporary_ward_no', $member->addresses[1]->ward_no) }}">
                            @error('temporary_ward_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="toll">Toll</label>
                            <input class="form-control {{ $errors->has('temporary_toll_no') ? 'is-invalid' : '' }}"
                                type="text" name="temporary_toll_no" id="temporary_toll_no"
                                value="{{ old('temporary_toll_no', $member->addresses[1]->toll_no) }}">
                            @error('temporary_toll_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row" id="foreign_address_modal" aria-hidden="true">
                        <legend><u> Foreign Address </u></legend>
                        <div class="form-group col-4">
                            <label>Address</label>
                            <input
                                class="form-control {{ $errors->has('foreign_country_address') ? 'is-invalid' : '' }}"
                                type="text" name="foreign_country_address" id="foreign_country_address"
                                value="{{ old('foreign_country_address', $member->addresses[2]->municipality_id) }}">
                            @error('foreign_country_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="help-block">{{ trans('cruds.member.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group col-4">
                            <label>City</label>
                            <input class="form-control {{ $errors->has('foreign_country_city') ? 'is-invalid' : '' }}"
                                type="text" name="foreign_country_city" id="foreign_country_city"
                                value="{{ old('foreign_country_city', $member->addresses[2]->district_id) }}">
                            @error('foreign_country_city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label>Postal/Zip Code</label>
                            <input
                                class="form-control {{ $errors->has('foreign_country_zip_code') ? 'is-invalid' : '' }}"
                                type="text" name="foreign_country_zip_code" id="foreign_country_zip_code"
                                value="{{ old('foreign_country_zip_code', $member->addresses[2]->toll_no) }}">
                            @error('foreign_country_zip_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="mobile">Mobile Number</label>
                            <input class="form-control {{ $errors->has('foreign_country_number') ? 'is-invalid' : '' }}"
                                type="text" name="foreign_country_number" id="foreign_country_number"
                                value="{{ old('foreign_country_number', $member->addresses[2]->ward_no) }}">
                            @error('foreign_country_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <legend><u> Extra Details </u></legend>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.identity_type') }}</label>
                        <select class="form-control {{ $errors->has('identity_type') ? 'is-invalid' : '' }}"
                            name="identity_type" id="identity_type">
                            <option value disabled {{ old('identity_type', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::IDENTITY_TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('identity_type', $member->identity_type) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @error('identity_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.identity_type_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="identity_number">{{ trans('cruds.member.fields.identity_number') }}</label>
                        <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}"
                            type="text" name="identity_number" id="identity_number"
                            value="{{ old('identity_number', $member->identity_number) }}">
                        @error('identity_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.identity_number_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label>Occupation</label>
                        <select class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                            name="occupation" id="occupation">
                            <option value disabled {{ old('occupation', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::OCCUPATION_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('occupation', $member->occupation) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @error('occupation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="identity_image">Identity Image (pdf or jpg only)</label>
                        <p>
                            <img style="height:120px; width:auto;' >"
                                src="{{ URL::to('/') . '/uploads/' . $member->identity_image }}">
                        </p>
                        <input class="custom-file-input" type="file" name="identity_image" id="identity_image">
                        @error('identity_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>

                    <div class="form-group col-4">
                        <label for="photo_for_id_card">Photo for ID card</label>
                        <p>
                            <img style="height:120px; width:auto;' >"
                                src="{{ URL::to('/') . '/uploads/' . $member->photo_for_id_card }}">
                        </p>
                        <input class="custom-file-input" type="file" name="photo_for_id_card" id="photo_for_id_card">
                        @error('photo_for_id_card')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="photo_for_id_card">Attach the membership Form</label>
                         <p>
                            <img style="height:120px; width:auto;' >"
                                src="{{ URL::to('/') . '/uploads/' . $member->membership_form }}">
                        </p>
                        <input class="custom-file-input" type="file" accept="image/*,application/pdf"
                            name="membership_form" id="membership_form">
                        @error('membership_form')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-12">

                            <label for=""><b>Interested Department:</b></label>

                        <div
                            class="form-check form-check form-check-inline {{ $errors->has('interested_department') ? 'is-invalid' : '' }}">
                            <input type="hidden" name="interested_department" value="0">
                            @foreach (\App\Member::INTERESTED_DEPARTMENT_SELECT as $key => $value)
                                <input class="form-check-input" type="checkbox" name="interested_department[]"
                                    id="interested_department" value="{{ $key }}" @if (in_array($value, $member->interested_department)) checked @endif>
                                <label class="form-check-label" for="interested_department">{{ $value }}</label>
                            @endforeach
                        </div>
                        @error('interested_department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-12">

                            <label for=""><b>Group: </b></label>

                        <div
                            class="form-check form-check form-check-inline {{ $errors->has('group') ? 'is-invalid' : '' }}">
                            <input type="hidden" name="group" value="0">
                            @foreach (\App\Member::GROUP_SELECT as $key => $value)
                                <input class="form-check-input" @if (in_array($value, $member->group)) checked @endif
                                    type="checkbox" name="group[]" id="group" value="{{ $key }}"
                                    >
                                <label class="form-check-label" for="group">{{ $value }}</label>
                            @endforeach
                        </div>
                        @error('group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="area_of_efficiency">{{ trans('cruds.member.fields.area_of_efficiency') }}</label>
                        <input class="form-control {{ $errors->has('area_of_efficiency') ? 'is-invalid' : '' }}"
                            type="text" name="area_of_efficiency" id="area_of_efficiency"
                            value="{{ old('area_of_efficiency', $member->area_of_efficiency) }}">
                        @error('area_of_efficiency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.area_of_efficiency_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.availability') }}</label>
                        <select class="form-control {{ $errors->has('availability') ? 'is-invalid' : '' }}"
                            name="availability" id="availability">
                            <option value disabled {{ old('availability', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::AVAILABILITY_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('availability', $member->availability) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @error('availability')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.availability_helper') }}</span>
                    </div>

                    <div class="form-group col-4">
                        <label>Membership Period</label>
                        <select class="form-control {{ $errors->has('year_of_membership_period') ? 'is-invalid' : '' }}"
                            name="year_of_membership_period" id="year_of_membership_period">
                            <option value disabled {{ old('year_of_membership_period', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::MEMBERSHIP_PERIOD as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('year_of_membership_period', $member->year_of_membership_period) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('year_of_membership_period')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.help_type_helper') }}</span>
                    </div>

                    <div class="form-group col-4">
                        <label for="membership_fee">{{ trans('cruds.member.fields.membership_fee') }}</label>
                        <input class="form-control {{ $errors->has('membership_fee') ? 'is-invalid' : '' }}"
                            type="number" name="membership_fee" id="membership_fee"
                            value="{{ old('membership_fee', $member->membership_fee) }}" step="0.01">
                       @error('membership_fee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.membership_fee_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.help_type') }}</label>
                        <select class="form-control {{ $errors->has('help_type') ? 'is-invalid' : '' }}"
                            name="help_type" id="help_type">
                            <option value disabled {{ old('help_type', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::HELP_TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('help_type', $member->help_type) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('help_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.help_type_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="help_goods">{{ trans('cruds.member.fields.help_goods') }}</label>
                        <input class="form-control {{ $errors->has('help_goods') ? 'is-invalid' : '' }}" type="text"
                            name="help_goods" id="help_goods" value="{{ old('help_goods', $member->help_goods) }}">
                        @error('help_goods')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.help_goods_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label for="help_money">{{ trans('cruds.member.fields.help_money') }}</label>
                        <input class="form-control {{ $errors->has('help_money') ? 'is-invalid' : '' }}" type="number"
                            name="help_money" id="help_money" value="{{ old('help_money', $member->help_money) }}"
                            step="0.01">
                        @error('help_money')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.help_money_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.currency') }}</label>
                        <select class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency"
                            id="currency">
                            <option value disabled {{ old('currency', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::CURRENCY_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('currency', $member->currency) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('currency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.currency_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.payment_type') }}</label>
                        <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}"
                            name="payment_type" id="payment_type">
                            <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::PAYMENT_TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('payment_type', $member->payment_type) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                        @error('payment_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.payment_type_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <label>{{ trans('cruds.member.fields.status') }}</label>
                        <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                            id="status">
                            <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                                {{ trans('global.pleaseSelect') }}</option>
                            @foreach (App\Member::STATUS_SELECT as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('status', $member->status) === (string) $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.status_helper') }}</span>
                    </div>
                    <div class="form-group col-4">
                        <div class="col-12">
                            <label>{{ trans('cruds.member.fields.is_paid') }}</label>
                        </div>
                        @foreach (App\Member::IS_PAID_RADIO as $key => $label)
                            <div class="form-check form-check-inline {{ $errors->has('is_paid') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="is_paid_{{ $key }}"
                                    name="is_paid" value="{{ $key }}"
                                    {{ old('is_paid', $member->is_paid) === (string) $key ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="is_paid_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @error('is_paid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.is_paid_helper') }}</span>
                    </div>
                    <div class="form-group col-12">
                        <label for="remarks">{{ trans('cruds.member.fields.remarks') }}</label>
                        <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text"
                            name="remarks" id="remarks" value="{{ old('remarks', $member->remarks) }}">
                        @error('remarks')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <span class="help-block">{{ trans('cruds.member.fields.remarks_helper') }}</span>
                    </div>
                    <div class="form-group col-12">
                        <input type="checkbox" {{ old('is_agreed', $member->is_agreed) == 1 ? 'checked' : '' }}
                            name="is_agreed" id="is_agreed" value="1">
                        <label for="">I agree</label>
                        @error('is_agreed')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        @if ($errors->has(''))
                            <div class="invalid-feedback">
                                {{ $errors->first('') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            if ($('#has_temporary_address_false').is(':checked')) {
                $('#temporary_address_modal').hide();
            }

            $('#has_temporary_address_true').click(function() {
                var inputValue = $(this).attr("value");
                // console.log(inputValue);
                $('#temporary_address_modal').show();
            });
            $('#has_temporary_address_false').click(function() {
                var inputValue = $(this).attr("value");
                // console.log(inputValue);
                $('#temporary_address_modal').hide();
            });

            $("#current_country").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    // console.log(optionValue);
                    if (optionValue == 'nepal') {
                        $('#foreign_address_modal').hide();
                    } else {
                        $('#foreign_address_modal').show();
                    }
                });
            }).change();
        });

    </script>
@endsection
