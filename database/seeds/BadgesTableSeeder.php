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
            array('badgename'=>'first_badge_time','badgeurl'=>'img/icons/time-badge-3.png', 'badgetext'=>'Run 15 minutes','xpPoints'=>15),
            array('badgename'=>'second_badge_time','badgeurl'=>'img/icons/time-badge-2.png', 'badgetext'=>'Run 30 minutes','xpPoints'=>30),
            array('badgename'=>'third_badge_time','badgeurl'=>'img/icons/time-badge-1.png', 'badgetext'=>'Run 1 hour','xpPoints'=>65),
            array('badgename'=>'first_badge_friend', 'badgeurl'=> 'img/icons/friends-badge-3.png', 'badgetext'=>'Add 1 buddy on Strava','xpPoints'=>15),
            array('badgename'=>'second_badge_friend','badgeurl'=>'img/icons/friends-badge-2.png', 'badgetext'=>'Add 5 buddies on Strava','xpPoints'=>30),
            array('badgename'=>'third_badge_friend','badgeurl'=>'img/icons/friends-badge-1.png', 'badgetext'=>'Add 10 buddies on Strava','xpPoints'=>65),
            array('badgename'=>'first_badge_miles','badgeurl'=>'img/icons/miles-badge-3.png', 'badgetext'=>'Run 5 kilometers','xpPoints'=>15),
            array('badgename'=>'second_badge_miles','badgeurl'=>'img/icons/miles-badge-2.png', 'badgetext'=>'Run 10 kilometers','xpPoints'=>30),
            array('badgename'=>'third_badge_miles','badgeurl'=>'img/icons/miles-badge-1.png', 'badgetext'=>'Run 15 kilometers','xpPoints'=>65),
            array('badgename'=>'first_badge_run','badgeurl'=>'img/icons/run-badge-3.png', 'badgetext'=>'Run 5 times','xpPoints'=>15),
            array('badgename'=>'second_badge_run','badgeurl'=>'img/icons/run-badge-2.png', 'badgetext'=>'Run 10 times','xpPoints'=>30),
            array('badgename'=>'third_badge_run','badgeurl'=>'img/icons/run-badge-1.png', 'badgetext'=>'Run 20 times','xpPoints'=>65),
        ));
    }
}
