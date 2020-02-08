<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $admin = User::create([
                    'username' => 'Admin ',
                    'firstname' => 'Education',
                    'lastname' => 'Engineer',
                    'gender' => 'male',
                    'verified' => '1',
                    'email_verified_at' => now(),
                    'birthdata' => '1_7_1996',
                    'academicrang' => 'Profssor',
                    'email' => 'educationengineer2020@gmail.com',
                    'is_staff' => '0',
                    'password' => bcrypt('123456'),
                    'is_admin' => '1',
                    'approved_at' => now(),
        ]);



        $role = Role::create(['name' => 'Admin']);
        $admin->assignRole([$role->id]);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $admin->syncPermissions($permissions);
    }

}
