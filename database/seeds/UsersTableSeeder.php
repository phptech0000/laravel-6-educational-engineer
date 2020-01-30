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
                    'username' => 'Hassan Elsaied',
                    'firstname' => 'Hassan',
                    'lastname' => 'Elsaied',
                    'gender' => 'male',
                    'birthdata' => '1_7_1996',
                    'academicrang' => 'Profssor',
                    'email' => 'admin@gmail.com',
                    'is_staff' => '0',
                    'password' => bcrypt('123456'),
                     'is_admin' =>'1',
        ]);



        $role = Role::create(['name' => 'Admin']);
        $admin->assignRole([$role->id]);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $admin->syncPermissions($permissions);
    }

}
