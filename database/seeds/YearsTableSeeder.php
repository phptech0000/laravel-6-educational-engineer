<?php

use Illuminate\Database\Seeder;
use App\Year;

class YearsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $years = [
            'First Year ',
            'Second Year',
            'Third Year',
            'Fourth Year',
        ];
        foreach ($years as $year) {
            Year::create(['year_name' => $year]);
        }
    }

}
