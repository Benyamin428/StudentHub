<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_teacher = Role::where('name', 'Teacher')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'Benyamin';
        $user->email = 'test@mail.com';
        $user->password = bcrypt('student');
        $user->save();
        $user->roles()->attach($role_user);

        $teacher = new User();
        $teacher->name = 'Benyamin';
        $teacher->email = 'test2@mail.com';
        $teacher->password = bcrypt('teacher');
        $teacher->save();
        $teacher->roles()->attach($role_teacher);

        $admin = new User();
        $admin->name = 'Benyamin';
        $admin->email = 'test3@mail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
