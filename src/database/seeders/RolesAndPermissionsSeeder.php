<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $admin = Role::create(['name' => 'admin']);
        $owner = Role::create(['name' => 'owner']);
        $user = Role::create(['name' => 'user']);

        // Permissions
        Permission::create(['name' => 'manage owners']); // 管理
        Permission::create(['name' => 'manage shops']); // 店舗情報管理
        Permission::create(['name' => 'manage reservations']); // 予約情報管理

        // Giving permissions to roles
        $admin->givePermissionTo(['manage owners']);
        $owner->givePermissionTo(['manage shops', 'manage reservations']);

        // ユーザーの作成
        $adminUser = User::create([
            'name' => 'popo1',
            'email' => 'popo1@example.com',
            'password' => Hash::make('popo1212'),
        ]);
        $adminUser->assignRole('admin');

        $ownerUser = User::create([
            'name' => 'popo2',
            'email' => 'popo2@example.com',
            'password' => Hash::make('popo1212'),
        ]);
        $ownerUser->assignRole('owner');

        $generalUser = User::create([
            'name' => 'popo3',
            'email' => 'popo3@example.com',
            'password' => Hash::make('popo1212'),
        ]);
        $generalUser->assignRole('user');
    }
}
