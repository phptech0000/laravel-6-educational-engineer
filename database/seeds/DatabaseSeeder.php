<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(PermissionTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(depsTableSeeder::class);
        $this->call(branchTableSeeder::class);
    }

}
