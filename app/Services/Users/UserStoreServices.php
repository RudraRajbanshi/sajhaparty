<?php


namespace App\Services\Users;

use App\User;
use App\UserHierarchy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class UserStoreServices 
{
    /**
    *   @param $request
    *   @return User $user
    */
    public static function store($request)
    {
        try {
            $user = User::create([
                'user_code' => Str::uuid()->toString(),
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'password' => $request->password
            ]);

            $user->roles()->sync($request->input('roles', []));

            self::hierarchyUpdateOrCreate($request, $user->user_code);
            
            $user->load(['userHierarchy', 'roles']);
            return $user;

        } catch (\Throwable $th) {

            return redirect()->route('admin.users.create')->withErrors($th->getMessage());

        }
    }

    /**
    *   Updates user
    *   @param $request
    *   @param $user
    */
    public static function update($request, $user)
    {
        try {
            //loading of realations
            $user->load(['userHierarchy', 'roles']);
            //temporarily storing old Atributes
            $old = $user->toArray();

            $user->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'password' => $request->password,
                'status' => $request->status
            ]);

            $user->roles()->sync($request->input('roles', []));
            
            self::hierarchyUpdateOrCreate($request, $user->user_code);

            //reloading relation after update
            $user->load(['userHierarchy', 'roles']);

            // adding old attributes to user model, used for activity log 
            $user->oldAttributes = $old;

            return $user;
            
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    private static function hierarchyUpdateOrCreate($request, $user_id)
    {
        return UserHierarchy::updateOrCreate([
            'user_id'   => $user_id,
        ],[
            'hierarchy_id' => $request->hierarchy_id,
            'access_location_id' => $request->access_location_id
        ]);
    }
}