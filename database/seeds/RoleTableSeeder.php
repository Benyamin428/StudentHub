<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'Student';
        $role_user->save();

        $role_teacher = new Role();
        $role_teacher->name = 'Teacher';
        $role_teacher->description = 'Teacher';
        $role_teacher->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Admin';
        $role_admin->save();
    }
}
