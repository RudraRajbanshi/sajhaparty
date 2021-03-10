<?php


namespace App\Services\Members;

use Exception;
use App\FormId;
use App\Member;
use App\FormSource;
use App\MemberAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberStoreServices
{
    /**
     * Request for update, the requested value is stored in json column edit of database. The data is not updated until approved
     */
    public static function edit($request, Member $member)
    {
        $member->update([
            'edit' => json_encode($request->toArray()),
            'status' => config('times.status.edit_request')
        ]);
        return $member;
    }
    /**
     * Stores Member
     * @param $request contains all the data send from frontend to store data of member
     * @return Member $member
     */
    public static function store($request)
    {

        // dd($request->group);
        $identity_image = '';
        if ($request->hasFile('identity_image')) {
            $file = $request->file('identity_image');
            $identity_image = date('ymdhis') . $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $file->move($path, $identity_image);
            // Storage::disk('images')->put($name,file_get_contents($file));
            // return $image;
        }
        $photo_for_id_card = '';
        if ($request->hasFile('photo_for_id_card')) {
            $file = $request->file('photo_for_id_card');
            $photo_for_id_card = date('ymdhis') . $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $file->move($path, $photo_for_id_card);
            // Storage::disk('images')->put($name,file_get_contents($file));
            // return $image;
        }
        $membership_form = '';
        if ($request->hasFile('membership_form')) {
            $file = $request->file('membership_form');
            $membership_form = date('ymdhis') . $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $file->move($path, $membership_form);
            // Storage::disk('images')->put($name,file_get_contents($file));
            // return $image;
        }

        $member = Member::updateOrCreate(
            [
                'name' => $request->name,
                'nepali_name' => $request->nepali_name,
                'email' => $request->email,
                'group' => $request->group,
                'area_code' => $request->area_code,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
                'status' => $request->status,
                'is_paid' => $request->is_paid,
                'remarks' => $request->remarks,
                'currency' => $request->currency,
                'help_type' => $request->help_type,
                'help_money' => $request->help_money,
                'help_goods' => $request->help_goods,
                'disability' => $request->disability,
                'occupation' => $request->occupation,
                'availability' => $request->availability,
                'payment_type' => $request->payment_type,
                'identity_type' => $request->identity_type,
                'date_of_birth' => $request->date_of_birth,
                'membership_fee' => $request->membership_fee,
                'identity_number' => $request->identity_number,
                'current_country' => $request->current_country,
                'area_of_efficiency' => $request->area_of_efficiency,
                'interested_department' => $request->interested_department,
                'payment_confirmation_code' => $request->payment_confirmation_code,
                'blood_group' => $request->blood_group,
                'highest_academic_qualification' => $request->highest_academic_qualification,
                'is_agreed' => $request->is_agreed,
                'identity_image' => $identity_image,
                'photo_for_id_card' => $photo_for_id_card,
                'year_of_membership_period' => $request->year_of_membership_period,
                'membership_form' => $membership_form
            ]
        );

        //store member address
        self::storeMemberAddress($request, $member->id);

        // return $member;
    }

    /**
     *  Stores the permanent and temporary address
     * if temporary address is outside Nepal, Province_id stores current country, districs_id stores foreign country address and toll_no stores the country zip code
     *   @return  bool
     *  @throws Exception (getMessage())
     */
    public static function storeMemberAddress($request, $id)
    {
        // dd($id);
        try {
            MemberAddress::updateOrCreate([

                'address_type' => 'permanent',
                'member_id' => $id
            ], [
                'province_id' => $request->province,
                'district_id' => $request->district,
                'municipality_id' => $request->municipality,
                'ward_no' => $request->ward_no,
                'toll_no' => $request->toll_no,
            ]);

            if ($request->has_temporary_address == 'Yes') {
                MemberAddress::updateOrCreate([

                    'address_type' => 'temporary',
                    'member_id' => $id
                ], [
                    'province_id' => $request->temporary_province,
                    'district_id' => $request->temporary_district,
                    'municipality_id' => $request->temporary_municipality,
                    'ward_no' => $request->temporary_ward_no,
                    'toll_no' => $request->temporary_toll_no,
                ]);
            } else {
                MemberAddress::updateOrCreate([

                    'address_type' => 'temporary',
                    'member_id' => $id
                ], [
                    'province_id' => '',
                    'district_id' => '',
                    'municipality_id' => '',
                    'ward_no' => '',
                    'toll_no' => '',
                ]);
            }

            if ($request->current_country != 'nepal') {
                MemberAddress::updateOrCreate([

                    'address_type' => 'foreign',
                    'member_id' => $id
                ], [
                    'province_id' => $request->current_country,
                    'district_id' => $request->foreign_country_address,
                    'toll_no' => $request->foreign_country_zip_code,
                    'municipality_id' => $request->foreign_country_city,
                    'ward_no' => $request->foreign_country_number,
                ]);
            } else {
                MemberAddress::updateOrCreate([

                    'address_type' => 'foreign',
                    'member_id' => $id
                ], [
                    'province_id' => '',
                    'district_id' => '',
                    'toll_no' => '',
                    'municipality_id' => '',
                    'ward_no' => '',
                ]);
            }

            return true;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 400);
        }
    }
}
