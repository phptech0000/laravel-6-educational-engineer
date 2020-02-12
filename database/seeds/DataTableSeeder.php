<?php

use Illuminate\Database\Seeder;
use App\User;
class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        User::create([
        'username' => 'Hassan ',
        'firstname' => 'Hassan',
        'lastname' => 'Elsaied',
        'gender' => 'male',
        'verified' => '1',
        'email_verified_at' => now(),
        'birthdata' => '1_7_1996',
        'academicrang' => 'Profssor',
        'email' => 'hassanelsaied80@gmail.com',
        'is_staff' => '1',
        'password' => bcrypt('123456'),
        'is_admin' => '0',
        'branch_id' => '1',
        'approved_at' => now(),
        ]);


        User::create([
            'username' => 'Esraa ',
            'firstname' => 'Esraa',
            'lastname' => 'Khale',
            'gender' => 'Female',
            'verified' => '1',
            'email_verified_at' => now(),
            'birthdata' => '1_7_1996',
            'academicrang' => 'Profssor',
            'email' => 'esraakhale22@gmail.com',
            'is_staff' => '1',
            'password' => bcrypt('123456'),
            'is_admin' => '0',
            'branch_id' => '3',
            'approved_at' => now(),
        ]);
    }
}
