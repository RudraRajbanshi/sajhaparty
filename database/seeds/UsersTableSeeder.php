<?php

use App\User;
use App\UserHierarchy;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'mobile_no'      => '9843699372',
                'password'       => '$2y$10$Tc7FnHpGY8ouz3RHjimWueSCvJ4CvHyrskV72NB94EjXPcnzsO6ti',
                'remember_token' => null,
                'user_code'        => Str::uuid()->toString()
            ],
        ];

        $userHierarchy = [];

        foreach($users as $user)
        {
            $userHierarchy[] = [
                'user_id' => $user['user_code'],
                'hierarchy_id' => 1
            ];
        }

        User::insert($users);
        // UserHierarchy::insert($userHierarchy);
    }
}
