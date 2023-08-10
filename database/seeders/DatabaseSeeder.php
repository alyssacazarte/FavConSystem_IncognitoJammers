<?php

namespace Database\Seeders;

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
        \App\Models\Appointment::factory(10)->create();
        \App\Models\Schedule::factory(10)->create();
        \App\Models\Service::factory(10)->create();
        \App\Models\Timeslot::factory(10)->create();

        // User::factory(10)->create();
        // php artisan migrate:fresh seeder
    }
}
