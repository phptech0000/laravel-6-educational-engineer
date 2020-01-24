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
                    'name' => 'Hassan Elsaied',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('123456')
        ]);



        $role = Role::create(['name' => 'Admin']);
        $admin->assignRole([$role->id]);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $admin->syncPermissions($permissions);
       
      
        
        
     
       
    }

}
