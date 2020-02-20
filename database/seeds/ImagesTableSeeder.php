<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
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
            DB::table('images')->insert([
                'imageable_type' => 'App\Hotel',
                'imageable_id' => $faker->unique()->numberBetween(1, 10),
                'path' => 'http://placeimg.com/640/480/arch/'.$faker->unique()->numberBetween(300, 1200)
            ]);
        }
    }
}
