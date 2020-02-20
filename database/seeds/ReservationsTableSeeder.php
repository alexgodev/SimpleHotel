<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('reservations')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'city_id' => $faker->numberBetween(1, 10),
                'room_id' => $faker->numberBetween(1, 30),
                'status' => $faker->boolean(50),
                'day_in' => $faker->dateTimeBetween('-8 days','now'),
                'day_out' => $faker->dateTimeBetween('now', '+8 days'),
            ]);
        }
    }
}
