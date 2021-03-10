<?php

use App\Municipality;
use Illuminate\Database\Seeder;

class MunicipalityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipalities = json_decode(file_get_contents(storage_path("information/municipalities.json")), true);

        Municipality::insert($municipalities);
    }
}
