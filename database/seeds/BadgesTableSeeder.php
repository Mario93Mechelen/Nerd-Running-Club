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
            array('badgename'=>'first_badge_time','badgeurl'=>'img/icons/time-badge-3.png', 'badgetext'=>'Run 15 minutes'),
            array('badgename'=>'second_badge_time','badgeurl'=>'img/icons/time-badge-2.png', 'badgetext'=>'Run 30 minutes'),
            array('badgename'=>'third_badge_time','badgeurl'=>'img/icons/time-badge-1.png', 'badgetext'=>'Run 1 hour'),
            array('badgename'=>'first_badge_friend', 'badgeurl'=> 'img/icons/friends-badge-3.png', 'badgetext'=>'Add 1 buddy on Strava'),
            array('badgename'=>'second_badge_friend','badgeurl'=>'img/icons/friends-badge-2.png', 'badgetext'=>'Add 5 buddies on Strava'),
            array('badgename'=>'third_badge_friend','badgeurl'=>'img/icons/friends-badge-1.png', 'badgetext'=>'Add 10 buddies on Strava'),
            array('badgename'=>'first_badge_miles','badgeurl'=>'img/icons/miles-badge-3.png', 'badgetext'=>'Run 5 kilometers'),
            array('badgename'=>'second_badge_miles','badgeurl'=>'img/icons/miles-badge-2.png', 'badgetext'=>'Run 10 kilometers'),
            array('badgename'=>'third_badge_miles','badgeurl'=>'img/icons/miles-badge-1.png', 'badgetext'=>'Run 15 kilometers'),
            array('badgename'=>'first_badge_run','badgeurl'=>'img/icons/run-badge-3.png', 'badgetext'=>'Run 5 times'),
            array('badgename'=>'second_badge_run','badgeurl'=>'img/icons/run-badge-2.png', 'badgetext'=>'Run 10 times'),
            array('badgename'=>'third_badge_run','badgeurl'=>'img/icons/run-badge-1.png', 'badgetext'=>'Run 20 times'),
        ));
    }
}
