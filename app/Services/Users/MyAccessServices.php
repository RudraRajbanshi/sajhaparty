<?php


namespace App\Services\Users;

use App\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;

class MyAccessServices
{
    /**
     * Returns the Class of Hierarhcy access.
     * If User has Hierarchy of "Province", "Province" is its class
     * @param User $user 
     * @return class Hierarchy class, Province or District
    */

    public static function myHierarchyClass(User $user)
    {
        //gets the title of hierarchy: Province or district or HQ likewise

        $title = $user->userHierarchy->hierarchy->title;

        //get the classname, every hierarchy has its own class except for root level,  Province hierarchy has Province Class
        $className = str_replace(" ", "", Str::title($title));

        return App::make('App\\' . $className);
    }

    /**
     * Returns the attribute name of Hierarhcy access.
     * If User has Hierarchy of "Province", "province" is its attribute, can be user to get province_code or province_id
     * @param string $title Title of Hierarchy of user
     * @return string $attribute 
    */
    public static function myHierarchyAttribute($title)
    {
        return str_replace(" ", "", strtolower($title));
    }

    public static function myAccessLocation(User $user)
    {
        try {
            //get the id of province or district from the access_location_code, if hierarchy is District with access_location_code = Kathmandu, gets the id of kathmandu. User can view only data of specified accesss location

            $attribute = self::myHierarchyAttribute($user->userHierarchy->hierarchy->title);

            $location = self::myHierarchyClass($user)::where($attribute . '_code', $user->userHierarchy->access_location_id)->first();

            return $location;
        } catch (\Throwable $th) {

            throw new Exception($th->getMessage());
        }
    }

    public static function myAccessLocationId(User $user)
    {
        return optional(self::myAccessLocation($user))->id;
    }
}
