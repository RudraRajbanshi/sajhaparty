<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Member;
use App\MemberAddress;
use App\Municipality;
use App\Province;
use App\Services\Members\MemberStoreServices;
use Carbon\Carbon;
use Exception;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $members = Member::latest()->get();

        return view('bibeksheel.admin.members.index', compact('members'));
    }

    public function create()
    {
        $provinces = Province::all();
        $districts = District::all();
        $municipalities = Municipality::all();

        return view('bibeksheel.admin.members.create', compact('provinces', 'districts', 'municipalities'));
    }

    public function store(StoreMemberRequest $request)
    {
        try {
            $member = MemberStoreServices::store($request);
            return redirect()->route('admin.members')->with('message', 'Member Saved');
            return response()->json([
                'error' => false,
                'message' => 'Member Saved'
            ]);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 400);
        }
    }

    public function show($id)
    {
        $member = Member::findorFail($id);
        return view('bibeksheel.admin.members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::findorFail($id);
        $provinces = Province::all();
        $districts = District::all();
        $municipalities = Municipality::all();
        return view('bibeksheel.admin.members.edit', compact(['provinces', 'districts', 'municipalities', 'member']));
    }

    public function update(UpdateMemberRequest $request, $id)
    {
        $member = Member::findorFail($id);
        $permanent_address = MemberAddress::where([['member_id', $id], ['address_type', 'permanent']])->first();
        $temporary_address = MemberAddress::where([['member_id', $id], ['address_type', 'temporary']])->first();
        $foreign_address = MemberAddress::where([['member_id', $id], ['address_type', 'foreign']])->first();
        // dd($temporary_address);

        $identity_image = '';
        if ($request->hasFile('identity_image')) {
            $file = $request->file('identity_image');
            $identity_image = date('ymdhis') . $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $file->move($path, $identity_image);
            $member->identity_image = $identity_image;
            // Storage::disk('images')->put($name,file_get_contents($file));
            // return $image;
        }
        $photo_for_id_card = '';
        if ($request->hasFile('photo_for_id_card')) {
            $file = $request->file('photo_for_id_card');
            $photo_for_id_card = date('ymdhis') . $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $file->move($path, $photo_for_id_card);
            $member->photo_for_id_card = $photo_for_id_card;
            // Storage::disk('images')->put($name,file_get_contents($file));
            // return $image;
        }
        $membership_form = '';
        if ($request->hasFile('membership_form')) {
            $file = $request->file('membership_form');
            $membership_form = date('ymdhis') . $file->getClientOriginalName();
            $path = public_path() . '/uploads/';
            $file->move($path, $membership_form);
            $member->membership_form = $membership_form;
            // Storage::disk('images')->put($name,file_get_contents($file));
            // return $image;
        }

        $member->name = $request->name;
        $member->nepali_name = $request->nepali_name;
        $member->email = $request->email;
        $member->group = $request->group;
        $member->area_code = $request->area_code;
        $member->mobile = $request->mobile;
        $member->gender = $request->gender;
        $member->status = $request->status;
        $member->is_paid = $request->is_paid;
        $member->remarks = $request->remarks;
        $member->currency = $request->currency;
        $member->help_type = $request->help_type;
        $member->help_money = $request->help_money;
        $member->help_goods = $request->help_goods;
        $member->disability = $request->disability;
        $member->occupation = $request->occupation;
        $member->availability = $request->availability;
        $member->payment_type = $request->payment_type;
        $member->identity_type = $request->identity_type;
        $member->date_of_birth = $request->date_of_birth;
        $member->membership_fee = $request->membership_fee;
        $member->identity_number = $request->identity_number;
        $member->current_country = $request->current_country;
        $member->area_of_efficiency = $request->area_of_efficiency;
        $member->interested_department = $request->interested_department;
        $member->payment_confirmation_code = $request->payment_confirmation_code;
        $member->blood_group = $request->blood_group;
        $member->highest_academic_qualification = $request->highest_academic_qualification;
        $member->is_agreed = $request->is_agreed;

        $permanent_address->province_id = $request->province;
        $permanent_address->district_id = $request->district;
        $permanent_address->municipality_id = $request->municipality;
        $permanent_address->ward_no = $request->ward_no;
        $permanent_address->toll_no = $request->toll_no;

        if ($temporary_address == null) {
        } else {
            $temporary_address->province_id = $request->temporary_province;
            $temporary_address->district_id = $request->temporary_district;
            $temporary_address->municipality_id = $request->temporary_municipality;
            $temporary_address->ward_no = $request->temporary_ward_no;
            $temporary_address->toll_no = $request->temporary_toll_no;

            $temporary_address->save();
        }

        if ($foreign_address == null) {
        } else {
            $foreign_address->province_id = $request->current_country;
            $foreign_address->district_id = $request->foreign_country_city;
            $foreign_address->municipality_id = $request->foreign_country_address;
            $foreign_address->ward_no = $request->foreign_country_number;
            $foreign_address->toll_no = $request->foreign_country_zip_code;

            $foreign_address->save();
        }

        $member->save();
        $permanent_address->save();

        return redirect()->route('admin.members')->with('message', 'Successfully Updated');
    }

    public function destroy($id)
    {
        $member = Member::findorFail($id);
        $member->delete();
        return back();
    }

    public function approve($id)
    {
        $date = Carbon::now();
        $member = Member::findorFail($id);

        $member->is_approved = true;
        $member->membership_approve_date = $date;

        $code = self::generateRandomString(6);

        // dd($code);
        while (Member::where('membership_code', '=', $code)->exists()) {
            $code = self::generateRandomString(6);
        }
        $member->membership_code = $code;
        $member->save();
        return redirect()->back()->with('message', 'Member ' . $member->name . ' has been Approved with Membership Code: ' . $code);
    }

    public function reject($id)
    {
        $member = Member::findorFail($id);
        $member->is_approved = false;
        $member->membership_code = '';
        $member->membership_approve_date = null;
        $member->save();
        return redirect()->back()->with('message', 'Member ' . $member->name . ' has been Rejected');
    }

    public static function generateRandomString($length)
    {
        // $characters = '23456789ABCDEFGHJKMNPQRSTWXY';
        $numbers = '23456789';
        $numbersLength = strlen($numbers);
        $randomNumbers = '';
        for ($i = 0; $i < 3; $i++) {
            $randomNumbers .= $numbers[rand(0, $numbersLength - 1)];
        }

        $characters = 'ABCDEFGHJKMNPQRSTWXY';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $mainCharacters = $randomString . $randomNumbers;
        $randomCode = str_shuffle($mainCharacters);

        return $randomCode;
    }
}
