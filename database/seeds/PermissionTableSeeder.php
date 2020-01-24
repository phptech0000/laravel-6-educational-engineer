<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'dep-list',
            'dep-create',
            'dep-edit',
            'dep-delete',
            'branch-list',
            'branch-create',
            'branch-edit',
            'branch-delete',
        ];
        foreach ($permissions as $permission){
             Permission::create(['name' => $permission]);
        }
    }

}
