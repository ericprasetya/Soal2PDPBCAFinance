<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Avanza',
                'brand' => 'Toyota',
                'price' => 200000000,
            ],
            [
                'name' => 'Xenia',
                'brand' => 'Daihatsu',
                'price' => 190000000,
            ],
            [
                'name' => 'Ertiga',
                'brand' => 'Suzuki',
                'price' => 210000000,
            ],
        ];

        foreach ($cars as $car) {
            \App\Models\Car::create($car);
        }
    }
}
