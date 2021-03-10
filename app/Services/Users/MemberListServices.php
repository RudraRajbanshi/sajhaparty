<?php


namespace App\Services\Users;

use App\User;
use Exception;
use App\Member;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use App\Services\Users\IsTopHierarchy;
use App\Services\Users\MyAccessServices;

class MemberListServices
{
    public static function memberListLimitedByAccess(User $user)
    {
        try {
            if(IsTopHierarchy::check($user)){

                return Member::with('addresses')->get();

            }else{
                return Member::with('addresses')->whereHas('addresses', function($address) use ($user){

                    return $address
                            ->where(
                                MyAccessServices::myHierarchyAttribute($user->userHierarchy->hierarchy->title).'_id', MyAccessServices::myAccessLocationId($user)
                            );


                })->get();
            }
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
