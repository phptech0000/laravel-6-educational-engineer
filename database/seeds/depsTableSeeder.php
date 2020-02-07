<?php

use Illuminate\Database\Seeder;
use App\dep;
use App\branch;

class depsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $deps = [
            [
                'name' => 'Computer Engineering',
                'year_found' => '1980',
                'descirptions' => 'Design Computer System',
                'user_id' => '1'
            ],
            [
                'name' => 'Civil Engineering',
                'year_found' => '1980',
                'descirptions' => 'Design Strucre System',
                'user_id' => '1'
            ],
            [
                'name' => 'Electicle Engineering',
                'year_found' => '1980',
                'descirptions' => 'Design Power System',
                'user_id' => '1'
            ],
            [
                'name' => 'Macanical Engineering',
                'year_found' => '1980',
                'descirptions' => 'Design Macanical System',
                'user_id' => '1'
            ],
        ];
        foreach ($deps as $dep) {
            dep::create($dep);
        }
    }

}
