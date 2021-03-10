<?php


namespace App\Services\Members;

use App\District;
use App\Province;
use App\Municipality;


class MemberEditDataDecode
{
    public static function decode($member)
    {
        $memberEdit = (object) [
            'membership_code' => $member->membership_code,
            'name' => $member->name,
            'nepali_name' => $member->nepali_name,
            'email' => $member->email,
            'group' => $member->group,
            'area_code' => $member->area_code,
            'mobile' => $member->mobile,
            'gender' => $member->gender,
            'status' => config('times.status.active'),
            'is_paid' => $member->is_paid,
            'remarks' => $member->remarks,
            'currency' => $member->currency,
            'help_type' => $member->help_type,
            'help_money' => $member->help_money,
            'help_goods' => $member->help_goods,
            'disability' => $member->disability,
            'occupation' => $member->occupation,
            'availability' => $member->availability,
            'payment_type' => $member->payment_type,
            'identity_type' => $member->identity_type,
            'date_of_birth' =>$member->date_of_birth,
            'membership_fee' => $member->membership_fee,
            'identity_number' => $member->identity_number,
            'current_country' => $member->current_country,
            'area_of_efficiency' => $member->area_of_efficiency,
            'interested_department' => $member->interested_department,
            'payment_confirmation_code' => $member->payment_confirmation_code,
            'blood_group' => $member->blood_group
        ];
        $memberPermanentAddressEdit = (object) [
            'province' => optional(Province::find($member->permanent_address->province))->name,
            'district' => optional(District::find($member->permanent_address->district))->name,
            'municipality' => optional(Municipality::find($member->permanent_address->municipality))->name,
            'ward_no'   => $member->permanent_address->ward_no,
            'toll_no'   => $member->permanent_address->toll_no
        ];

        $memberTemporaryAddressEdit = (object) [
            'province' => Province::find($member->temporary_address->province)->name ?? $member->current_country,
            'district' => District::find($member->temporary_address->district)->name ?? $member->foreign_country_address,
            'municipality' => Municipality::find($member->temporary_address->municipality)->name ?? null,
            'ward_no'   => $member->temporary_address->ward_no ?? null,
            'toll_no'   => $member->temporary_address->toll_no ?? $member->foreign_country_zip_code
        ];

        $memberFormSourceEdit = $member->form_source;

        return (object) [
            'member' => $memberEdit,
            'permanent_address' => $memberPermanentAddressEdit,
            'temporary_address' => $memberTemporaryAddressEdit,
            'form_source' => $memberFormSourceEdit
        ];
    }

    public static function storeDecode($member)
    {
        $member->has_foreign_address = $member->current_country == 'Nepal' ? false : true;
        $member->date_of_birth = (array) $member->date_of_birth;
        $member->permanent_address = (array)$member->permanent_address;
        $member->temporary_address = (array)$member->temporary_address;
        $member->edit = null;
        $member->status = config('times.status.active');
        return $member;
    }
}
