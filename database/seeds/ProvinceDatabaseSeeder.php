<?php

use App\Province;
use Illuminate\Database\Seeder;

class ProvinceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            [
                "id"=>"1",
                "province_code"=>"प्रदेश-नम्बर-१",
                "name"=>"प्रदेश नम्बर १",
                "status"=>"active",
                "remarks"=>null
            
            ],
            [
                "id"=>"2",
                "province_code"=>"प्रदेश-नम्बर-२",
                "name"=>"प्रदेश नम्बर २",
                "status"=>"active",
                "remarks"=>null
            ],
            [
                "id"=>"3",
                "province_code"=>"प्रदेश-नम्बर-३",
                "name"=>"प्रदेश नम्बर ३",
                "status"=>"active",
                "remarks"=>null
            ],
            [
                "id"=>"4",
                "province_code"=>"गण्डकी-प्रदेश",
                "name"=>"गण्डकी प्रदेश",
                "status"=>"active",
                "remarks"=>null
            ],
            [
                "id"=>"5",
                "province_code"=>"प्रदेश-नं.-५",
                "name"=>"प्रदेश नं. ५",
                "status"=>"active",
                "remarks"=>null
            ],
            [
                "id"=>"6",
                "province_code"=>"कर्णाली-प्रदेश",
                "name"=>"कर्णाली प्रदेश",
                "status"=>"active",
                "remarks"=>null
            ],
            [
                "id"=>"7",
                "province_code"=>"सुदुरपश्चिम-प्रदेश",
                "name"=>"सुदुरपश्चिम प्रदेश",
                "status"=>"active",
                "remarks"=>null
            ]
        ];

        Province::insert($provinces);
    }
}
