<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlSeeder extends Seeder
{
    private $types;
    private $levels;
    private $deliveries;
    private $products;

    public function __construct()
    {
        $this->types = $this->_setTypes();
        $this->levels = $this->_setLevels();
        $this->products = $this->_setProducts();
        $this->deliveries = $this->_setDeliveries();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            'types' => $this->types,
            'levels' => $this->levels,
            'products' => $this->products,
            'deliveries' => $this->deliveries,
        ];


        foreach($tables as $table => $data) {
            DB::table($table)->insert($data);
        }

    }

    private function _setTypes()
    {
        return [
            [
                'name' => 'New',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Edit',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
    }

    private function _setLevels()
    {
        return [
            [
                'name' => 'Postgraduate',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Undergraduate',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
    }

    private function _setDeliveries()
    {
        return [
            [
                'name' => '24 hours',
                'value' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '5 days',
                'value' => '5',
                'created_at' => now(),
                'updated_at' => now()
            ],
//            [
//                'name' => '7 days',
//                'value' => '7',
//                'created_at' => now(),
//                'updated_at' => now()
//            ]
        ];
    }

    private function _setProducts()
    {
        return [
            [
                'name' => 'Russell',
                'slug' => 'russel-personal-statements',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Oxbridge',
                'slug' => 'oxbridge-personal-statements',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medical Applications',
                'slug' => 'medical-applications',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Law Applications',
                'slug' => 'law-applications',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Other',
                'slug' => 'other-applications',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Consultation Services
            [
                'name' => 'University Selection',
                'slug' => 'university-selection',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Course Selection',
                'slug' => 'course-selection',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'University & Course Selection',
                'slug' => 'university-course-selection',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Interview Preparation',
                'slug' => 'interview-preparation',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Career Questions Preparation',
                'slug' => 'career-questions-preparation',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Assisting Services
            [
                'name' => 'CV Preparation',
                'slug' => 'cv-preparation',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cover Letter',
                'slug' => 'cover-letter',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Reference Letter',
                'slug' => 'reference-letter',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Professional Personal Statement ',
                'slug' => 'Professional-personal-statement ',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Interview Preparation',
                'slug' => 'Interview-preparation',
                'intro' => '',
                'body' => '',
                'header_image' => '',
                'service_id' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
    }
}
