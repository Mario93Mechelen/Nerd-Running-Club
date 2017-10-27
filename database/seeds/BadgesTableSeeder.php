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
            array('badgename'=>'first_badge_time','badgeurl'=>''),
            array('badgename'=>'second_badge_time','badgeurl'=>''),
            array('badgename'=>'third_badge_time','badgeurl'=>''),
            array('badgename'=>'first_badge_friend','badgeurl'=>''),
            array('badgename'=>'second_badge_friend','badgeurl'=>''),
            array('badgename'=>'third_badge_friend','badgeurl'=>''),
            array('badgename'=>'first_badge_miles','badgeurl'=>''),
            array('badgename'=>'second_badge_miles','badgeurl'=>''),
            array('badgename'=>'third_badge_miles','badgeurl'=>''),

        ));
    }
}
