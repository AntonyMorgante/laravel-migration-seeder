<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Holiday;


class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0;$i<20;$i++){

            $bool=$faker->boolean();
            $date_depart=$faker->dateTimeInInterval('+8 weeks', '+6 days');
            $date_return = clone $date_depart;
            date_add($date_return,date_interval_create_from_date_string("1 week"));

            $holiday = new Holiday();
            $holiday -> destination = $faker->word();
            $holiday -> in_italy = $bool;
            if ($bool){
                $holiday -> in_eu = $bool;
            }
            else{
                $holiday -> in_eu = $faker->boolean();
            }
            $holiday -> departure = $date_depart;
            $holiday -> return = $date_return;
            $holiday -> save();
        }
    }
}