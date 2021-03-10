<?php


namespace App\Services\Users;

use App\User;
use App\Member;
use App\Services\Users\MyAccessServices;


class CanAccessLocationServices
{
    public static function check(User $user, Member $member)
    {
        if(IsTopHierarchy::check($user)){
            return true;
        }else{
            $myAccessLocationId = MyAccessServices::myAccessLocationId($user);
    
            $attribute = MyAccessServices::myHierarchyAttribute($user->userHierarchy->hierarchy->title) . '_id';
    
            foreach ($member->addresses as $address) {
                if ($address->$attribute == $myAccessLocationId)
                    return true;
            }
    
            return false;
        }
    }
}