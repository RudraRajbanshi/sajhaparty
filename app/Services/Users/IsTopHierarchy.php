<?php


namespace App\Services\Users;

use App\User;

class IsTopHierarchy
{
    public static function check(User $user)
    {
        return in_array($user->userHierarchy->hierarchy->title, config('times.top_hierarchy'));
    }
}