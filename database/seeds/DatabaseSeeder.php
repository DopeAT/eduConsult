<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 50)->create();
        factory(\App\Faq::class, 20)->create();
        factory(\App\Newsletter::class, 200)->create();
        factory(\App\Message::class, 150)->create();
        factory(\App\Testimonial::class, 5)->create();
        factory(\App\Team::class, 10)->create();
        factory(\App\Service::class, 8)->create();
    }
}
