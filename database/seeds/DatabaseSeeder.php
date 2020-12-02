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
        $this->call(UserTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(TaxonomySeeder::class);
        $this->call(PrototypeSeeder::class);
    }
}