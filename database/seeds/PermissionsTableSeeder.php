<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'location_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'province_create',
            ],
            [
                'id'    => '19',
                'title' => 'province_edit',
            ],
            [
                'id'    => '20',
                'title' => 'province_show',
            ],
            [
                'id'    => '21',
                'title' => 'province_delete',
            ],
            [
                'id'    => '22',
                'title' => 'province_access',
            ],
            [
                'id'    => '23',
                'title' => 'district_create',
            ],
            [
                'id'    => '24',
                'title' => 'district_edit',
            ],
            [
                'id'    => '25',
                'title' => 'district_show',
            ],
            [
                'id'    => '26',
                'title' => 'district_delete',
            ],
            [
                'id'    => '27',
                'title' => 'district_access',
            ],
            [
                'id'    => '28',
                'title' => 'municipality_create',
            ],
            [
                'id'    => '29',
                'title' => 'municipality_edit',
            ],
            [
                'id'    => '30',
                'title' => 'municipality_show',
            ],
            [
                'id'    => '31',
                'title' => 'municipality_delete',
            ],
            [
                'id'    => '32',
                'title' => 'municipality_access',
            ],
            [
                'id'    => '33',
                'title' => 'form_code_create',
            ],
            [
                'id'    => '34',
                'title' => 'form_code_edit',
            ],
            [
                'id'    => '35',
                'title' => 'form_code_show',
            ],
            [
                'id'    => '36',
                'title' => 'form_code_delete',
            ],
            [
                'id'    => '37',
                'title' => 'form_code_access',
            ],
            [
                'id'    => '38',
                'title' => 'membership_management_access',
            ],
            [
                'id'    => '39',
                'title' => 'member_create',
            ],
            [
                'id'    => '40',
                'title' => 'member_edit',
            ],
            [
                'id'    => '41',
                'title' => 'member_show',
            ],
            [
                'id'    => '42',
                'title' => 'member_delete',
            ],
            [
                'id'    => '43',
                'title' => 'member_access',
            ],
            [
                'id'    => '44',
                'title' => 'member_approve'
            ]
        ];

        Permission::insert($permissions);
    }
}
