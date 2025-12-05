<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'setting_access',
            ],
            [
                'id'    => 18,
                'title' => 'message_create',
            ],
            [
                'id'    => 19,
                'title' => 'message_edit',
            ],
            [
                'id'    => 20,
                'title' => 'message_show',
            ],
            [
                'id'    => 21,
                'title' => 'message_delete',
            ],
            [
                'id'    => 22,
                'title' => 'message_access',
            ],
            [
                'id'    => 23,
                'title' => 'view_data_create',
            ],
            [
                'id'    => 24,
                'title' => 'view_data_edit',
            ],
            [
                'id'    => 25,
                'title' => 'view_data_show',
            ],
            [
                'id'    => 26,
                'title' => 'view_data_delete',
            ],
            [
                'id'    => 27,
                'title' => 'view_data_access',
            ],
            [
                'id'    => 28,
                'title' => 'address_create',
            ],
            [
                'id'    => 29,
                'title' => 'address_edit',
            ],
            [
                'id'    => 30,
                'title' => 'address_show',
            ],
            [
                'id'    => 31,
                'title' => 'address_delete',
            ],
            [
                'id'    => 32,
                'title' => 'address_access',
            ],
            [
                'id'    => 33,
                'title' => 'app_setting_create',
            ],
            [
                'id'    => 34,
                'title' => 'app_setting_edit',
            ],
            [
                'id'    => 35,
                'title' => 'app_setting_show',
            ],
            [
                'id'    => 36,
                'title' => 'app_setting_delete',
            ],
            [
                'id'    => 37,
                'title' => 'app_setting_access',
            ],
            [
                'id'    => 38,
                'title' => 'otp_create',
            ],
            [
                'id'    => 39,
                'title' => 'otp_edit',
            ],
            [
                'id'    => 40,
                'title' => 'otp_show',
            ],
            [
                'id'    => 41,
                'title' => 'otp_delete',
            ],
            [
                'id'    => 42,
                'title' => 'otp_access',
            ],
            [
                'id'    => 43,
                'title' => 'extra_setting_create',
            ],
            [
                'id'    => 44,
                'title' => 'extra_setting_edit',
            ],
            [
                'id'    => 45,
                'title' => 'extra_setting_show',
            ],
            [
                'id'    => 46,
                'title' => 'extra_setting_delete',
            ],
            [
                'id'    => 47,
                'title' => 'extra_setting_access',
            ],
            [
                'id'    => 48,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
