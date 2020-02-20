<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
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
            DB::table('hotels')->insert([
                'name' => $faker->unique()->company,
                'description' => $faker->text(1000),
                'city_id' => $faker->numberBetween(1,10),
                'user_id' => $faker->numberBetween(1,10),
                'address' => $faker->streetName.', '.$faker->numberBetween(1,200),
            ]);
        }
    }
}
