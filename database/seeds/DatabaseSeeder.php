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
        // @TODO this is temporary code to facilitate development
         $this->call(DevelopmentSeeder::class);
    }
}
