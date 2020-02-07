<?php

use Illuminate\Database\Seeder;
use App\branch;
class branchTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $branchs = [
            [
                'branch' => 'Hardware Engineering',
                'dep_id' => '1'
            ],
            [
                'branch' => 'software Engineering',
                'dep_id' => '1'
            ],
            [
                'branch' => 'Network Engineering',
                'dep_id' => '1'
            ],
            [
                'branch' => 'Control Engineering',
                'dep_id' => '1'
            ],
            [
                'branch' => 'Construction Engineering',
                'dep_id' => '2'
            ],
            [
                'branch' => 'Earthquake Engineering',
                'dep_id' => '2'
            ],
            [
                'branch' => 'Environmental  Engineering',
                'dep_id' => '2'
            ],
            [
                'branch' => 'Forensic  Engineering',
                'dep_id' => '2'
            ],
            [
                'branch' => 'Geotechnical   Engineering',
                'dep_id' => '2'
            ],
            [
                'branch' => 'Power   Engineering',
                'dep_id' => '3'
            ],
            [
                'branch' => 'Commuication   Engineering',
                'dep_id' => '3'
            ],
            [
                'branch' => 'Power   Engineering',
                'dep_id' => '4'
            ],
        ];
        foreach ($branchs as $branch){
            branch::create($branch);   
        }
    }

}
