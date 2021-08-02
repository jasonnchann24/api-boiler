<?php

namespace Database\Seeders;

use Database\Seeders\Fake\FakeRoleSeeder;
use Database\Seeders\Fake\FakeUserPinSeeder;
use Database\Seeders\Fake\FakeUserSeeder;
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
        $this->call([
            FakeRoleSeeder::class,
            FakeUserSeeder::class,
            FakeUserPinSeeder::class
        ]);
    }
}
