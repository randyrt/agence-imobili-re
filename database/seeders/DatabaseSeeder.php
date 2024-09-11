<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'ragnar@gmail.com'
        ]);

        $option = Option::factory(10)->create();
        Property::factory(60)
            ->hasAttached($option->Random(3))
            ->create();




        //User::factory()->unverified()->create();
    }
}
