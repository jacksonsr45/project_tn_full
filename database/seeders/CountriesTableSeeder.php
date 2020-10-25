<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert([
            ['id' => 1,    'name' => 'Brasil',   'initials' => 'BR'],
        ]);
    }
}
