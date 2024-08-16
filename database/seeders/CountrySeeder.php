<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $country = Country::create([
            'name' => "Maroc",
            'code' => "MA"
        ]);

        City::create([
            'name' => "Nador",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Casablanca",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Rabat",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Fès",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Marrakech",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Tanger",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Agadir",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Meknès",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Oujda",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Tétouan",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Laâyoune",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Safi",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Khouribga",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "El Jadida",
            'country_id' => $country->id
        ]);

        City::create([
            'name' => "Beni Mellal",
            'country_id' => $country->id
        ]);
    }
}
