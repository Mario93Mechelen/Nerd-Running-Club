<?php

use Illuminate\Database\Seeder;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->insert(array(
            array('badge_name'=>'first_badge_time','badge_url'=>''),
            array('badge_name'=>'second_badge_time','badge_url'=>''),
            array('badge_name'=>'third_badge_time','badge_url'=>''),
            array('badge_name'=>'first_badge_friend','badge_url'=>''),
            array('badge_name'=>'second_badge_friend','badge_url'=>''),
            array('badge_name'=>'third_badge_friend','badge_url'=>''),
            array('badge_name'=>'first_badge_miles','badge_url'=>''),
            array('badge_name'=>'second_badge_miles','badge_url'=>''),
            array('badge_name'=>'third_badge_miles','badge_url'=>''),

        ));
    }
}
