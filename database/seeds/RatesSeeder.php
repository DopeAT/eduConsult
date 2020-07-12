<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = [
            'personalStatementsRates' => [
                // Russel Under New
                [
                    'product_id' => 1,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '250.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Russel Under Edit
                [
                    'product_id' => 1,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '130.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Russel Post New
                [
                    'product_id' => 1,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '250.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Russel Post Edit
                [
                    'product_id' => 1,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '130.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Oxbridge Under New
                [
                    'product_id' => 2,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '270.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Oxbridge Under Edit
                [
                    'product_id' => 2,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '150.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Oxbridge Post New
                [
                    'product_id' => 2,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '270.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Oxbridge Post Edit
                [
                    'product_id' => 2,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '150.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Medical Applications Under New
                [
                    'product_id' => 3,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '300.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Medical Applications Under Edit
                [
                    'product_id' => 3,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '170.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Medical Applications Post New
                [
                    'product_id' => 3,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '300.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Medical Applications Post Edit
                [
                    'product_id' => 4,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '170.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Law Applications Under New
                [
                    'product_id' => 4,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '300.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Law Applications Under Edit
                [
                    'product_id' => 4,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '170.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Law Applications Post New
                [
                    'product_id' => 4,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '300.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Law Applications Post Edit
                [
                    'product_id' => 4,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '170.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Other Applications Under New
                [
                    'product_id' => 5,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '130.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Other Applications Under Edit
                [
                    'product_id' => 5,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 2,
                    'delivery_id' => 2,
                    'total' => '100.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Other Applications Post New
                [
                    'product_id' => 5,
                    'service_id' => 1,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '230.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                // Other Applications Post Edit
                [
                    'product_id' => 5,
                    'service_id' => 1,
                    'type_id' => 2,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '100.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ],
            'consultationRates' => [
                [
                    'product_id' => 6,
                    'service_id' => 2,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '150.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 7,
                    'service_id' => 2,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '150.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 8,
                    'service_id' => 2,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '350.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 9,
                    'service_id' => 2,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '300.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 10,
                    'service_id' => 2,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '200.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ],
            'assistingRates' => [
                [
                    'product_id' => 11,
                    'service_id' => 3,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '150.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 12,
                    'service_id' => 3,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '120.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 13,
                    'service_id' => 3,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '150.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 14,
                    'service_id' => 3,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '170.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'product_id' => 15,
                    'service_id' => 3,
                    'type_id' => 1,
                    'level_id' => 1,
                    'delivery_id' => 2,
                    'total' => '350.00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ],
        ];

        foreach($rates as $type => $data) {
            DB::table('rates')->insert($data);
        }

    }
}
