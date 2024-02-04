<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Faker\Provider\FakeCar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;


class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new Fakecar($faker));

        for ($i = 0; $i < 20; $i++) {
            Vehicle::create([
                'brand' => $faker->vehicleBrand,
                'model' => $faker->vehicleModel,
                'plate_number' => $faker->vehicleRegistration,
                'insurance_date' => $faker->date
            ]);
            //imav error pri instalacija na pakeot,poradi toa racno seednav 
            // }
            // $cars = [
            //     ['brand' => 'Toyota', 'model' => 'Camry', 'plate_number' => 'ABC123'],
            //     ['brand' => 'Honda', 'model' => 'Civic', 'plate_number' => 'XYZ456'],
            //     ['brand' => 'Ford', 'model' => 'Focus', 'plate_number' => 'DEF789'],
            //     ['brand' => 'Mazda', 'model' => 'Mazda3', 'plate_number' => 'VWX567'],
            //     ['brand' => 'Kia', 'model' => 'Forte', 'plate_number' => 'YZA890'],
            //     ['brand' => 'Audi', 'model' => 'A4', 'plate_number' => 'BCD123'],
            //     ['brand' => 'Mercedes-Benz', 'model' => 'C-Class', 'plate_number' => 'EFG456'],
            //     ['brand' => 'BMW', 'model' => '3 Series', 'plate_number' => 'HIJ789'],
            //     ['brand' => 'Lexus', 'model' => 'ES', 'plate_number' => 'KLM012'],
            //     ['brand' => 'Jeep', 'model' => 'Cherokee', 'plate_number' => 'NOP345'],
            //     ['brand' => 'Tesla', 'model' => 'Model 3', 'plate_number' => 'QRS678'],
            //     ['brand' => 'GMC', 'model' => 'Terrain', 'plate_number' => 'TUV901'],
            //     ['brand' => 'Chrysler', 'model' => '300', 'plate_number' => 'WXY234'],
            //     ['brand' => 'Buick', 'model' => 'Regal', 'plate_number' => 'ZAB567'],
            //     ['brand' => 'Acura', 'model' => 'TLX', 'plate_number' => 'CDE890'],
            //     ['brand' => 'Acura', 'model' => 'TLX', 'plate_number' => 'CDE890'],
            // ];

            // foreach ($cars as $car) {
            //     Vehicle::create([
            //         'brand'           => $car['brand'],
            //         'model'           => $car['model'],
            //         'plate_number'    => $car['plate_number'],
            //         'insurance_date'  => Carbon::now()->addDays(rand(1, 365))
            //     ]);
            // }
        }
    }
}
