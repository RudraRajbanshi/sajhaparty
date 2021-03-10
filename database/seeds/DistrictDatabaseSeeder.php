<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = json_decode(file_get_contents(storage_path("information/districts.json")),true);
        
        District::insert($districts);

    }
}
