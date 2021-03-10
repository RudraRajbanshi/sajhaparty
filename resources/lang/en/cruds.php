<?php

return [
	'dashboard' => [
		'title'	=> 'Dashboard'
	],
    'userManagement'     => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'         => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'               => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'               => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'mobile_no'                    => 'Mobile Number',
            'mobile_no_helper'             => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'hierarchy_id'           => 'Hierarchy Status',
            'hierarchy_id_helper'    => 'Select Hierarchy',
            'hierarchy_access_location'           => 'Access Location',
            'hierarchy_access_location_helper'    => 'Enter Location Access',
            'status'           => 'Status of Account',
            'status_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'locationManagement' => [
        'title'          => 'Location Management',
        'title_singular' => 'Location Management',
    ],
    'province'           => [
        'title'          => 'Province',
        'title_singular' => 'Province',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => 'Enter Name of Province',
            'province_code'              => 'Province Code',
            'province_code_helper'       => '',
            'status'            => 'Status',
            'status_helper'     => '',
            'remarks'           => 'Remarks',
            'remarks_helper'    => 'Enter Remarks',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'district'           => [
        'title'          => 'District',
        'title_singular' => 'District',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'district_code'              => 'District Code',
            'district_code_helper'       => '',
            'name'              => 'Name',
            'name_helper'       => 'Enter name of district',
            'status'            => 'Status',
            'status_helper'     => '',
            'province'          => 'Province',
            'province_helper'   => 'Select Province',
            'remarks'           => 'Remarks',
            'remarks_helper'    => 'Enter Remarks',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'municipality'       => [
        'title'          => 'Municipalities',
        'title_singular' => 'Municipality',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'district'                 => 'District',
            'district_helper'          => '',
            'wards'                    => 'Wards',
            'wards_helper'             => '',
            'municipality_code'        => 'Municipality Code',
            'municipality_code_helper' => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'slug'                     => 'Slug',
            'slug_helper'              => '',
            'remarks'                  => 'Remarks',
            'remarks_helper'           => '',
        ],
    ],
    'form-codes'       => [
        'title'          => 'Form Identity',
        'title_singular' => 'Form Identity',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'no_of_form_codes'         => 'No. of Form Ids to be generated',
            'no_of_form_codes_helper'  => 'Enter No. of Forms Ids to be generated and print',
            'form_code'                => 'Form Code',
            'status'                    => 'Status'
        ],
    ],
    'membershipManagement' => [
        'title'          => 'Membership Management',
        'title_singular' => 'Membership Management',
    ],
    'member'               => [
        'title'          => 'Member',
        'title_singular' => 'Member',
        'add_member' => "Add Member",
        'fields'         => [
            'form_source'               => 'Form Source',
            'id'                           => 'ID',
            'id_helper'                    => '',
            'membership_code'              => 'Membership Code',
            'membership_code_helper'       => '',
            'name'                         => 'Name',
            'name_helper'                  => '',
            'nepali_name'                  => 'पुरा नाम',
            'nepali_name_helper'            => '',
            'email'                        => 'Email',
            'email_helper'                 => '',
            'mobile'                       => 'Mobile',
            'mobile_helper'                => '',
            'area_code'                       => 'Area Code',
            'area_code_helper'                => '',
            'blood_group'                       => 'Blood Group',
            'blood_group_helper'                => '',
            'gender'                       => 'Gender',
            'gender_helper'                => '',
            'disability'                   => 'Disability',
            'disability_helper'            => '',
            'date_of_birth'                => 'Date Of Birth',
            'date_of_birth_helper'         => '',
            'identity_type'                => 'Identity Type',
            'identity_type_helper'         => '',
            'identity_number'              => 'Identity Number',
            'identity_number_helper'       => '',
            'current_country'              => 'Current Country',
            'current_country_helper'       => '',
            'group'                        => 'Group',
            'group_helper'                 => '',
            'occupation'                   => 'Occupation',
            'occupation_helper'            => '',
            'area_of_efficiency'           => 'Area Of Efficiency',
            'area_of_efficiency_helper'    => '',
            'interested_department'        => 'Interested Department',
            'interested_department_helper' => '',
            'availability'                 => 'Availability',
            'availability_helper'          => '',
            'membership_fee'               => 'Membership Fee',
            'membership_fee_helper'        => '',
            'help_type'                    => 'Help Type',
            'help_type_helper'             => '',
            'help_goods'                   => 'Help Goods',
            'help_goods_helper'            => '',
            'help_money'                   => 'Help Money',
            'help_money_helper'            => '',
            'currency'                     => 'Currency',
            'currency_helper'              => '',
            'payment_type'                 => 'Payment Type',
            'payment_type_helper'          => '',
            'is_paid'                      => 'Is Paid',
            'is_paid_helper'               => '',
            'status'                       => 'Status',
            'status_helper'                => '',
            'remarks'                      => 'Remarks',
            'remarks_helper'               => '',
            'created_at'                   => 'Created at',
            'created_at_helper'            => '',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => '',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => '',
            'year'                   => 'Year',
            'year_helper'            => '',
            'month'                   => 'Month',
            'month_helper'            => '',
            'day'                   => 'Day',
            'day_helper'            => '',
            'permanent_address' => 'Permanent Address',
            'temporary_address' => 'Temporary Address',
            'has_temporary_address' => 'Has Temporary Adress?',
            'province'  => 'Province',
            'district' => 'District',
            'municipality' => 'Municipality',
            'ward_no' => 'Ward Number',
            'toll_no' => 'Toll Number',
            'foreign_country_address' => 'Foreign Country Address',
            'foreign_country_full_address' => 'Enter Current Country Address',
            'foreign_country_zip_code' => 'Zip/Postal Code',
            'foreign_country_zip_code_helper' => 'Enter Current Country Address',
            'payment_confirmation_code' => 'Payment Confirmation',
            'payment_confirmation_code_helper' => 'Enter Payment Confirmation Code or description of payment confirmation'
        ],
    ],
    'member_approve' => [
        'title' => 'Approve Members Entry',
    ],
    'member_edit_approve' => [
        'title' => 'Approve Members Edit',
    ],
    'settings'     => [
        'title'          => 'Settings',
        'title_singular' => 'Settings',
    ],
];
