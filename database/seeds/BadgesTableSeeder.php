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
            array('badgename'=>'first_badge_time','badgeurl'=>'img/icons/time-badge-1.png', 'badgetext'=>'You just ran 15 minutes.'),
            array('badgename'=>'second_badge_time','badgeurl'=>'img/icons/time-badge-2.png', 'badgetext'=>'You just ran 30 minutes.'),
            array('badgename'=>'third_badge_time','badgeurl'=>'img/icons/time-badge-3.png', 'badgetext'=>'You just ran 1 hour. '),
            array('badgename'=>'first_badge_friend', 'badgeurl'=> 'img/icons/friends-badge-1.png', 'badgetext'=>'You have 1 buddy on Strava'),
            array('badgename'=>'second_badge_friend','badgeurl'=>'img/icons/friends-badge-2.png', 'badgetext'=>'You have 5 buddies on Strava'),
            array('badgename'=>'third_badge_friend','badgeurl'=>'img/icons/friends-badge-3.png', 'badgetext'=>'You have 10 buddies on Strava'),
            array('badgename'=>'first_badge_miles','badgeurl'=>'img/icons/miles-badge-1.png', 'badgetext'=>'You just ran 5 kilometers.'),
            array('badgename'=>'second_badge_miles','badgeurl'=>'img/icons/miles-badge-2.png', 'badgetext'=>'You just ran 10 kilometers.'),
            array('badgename'=>'third_badge_miles','badgeurl'=>'img/icons/miles-badge-3.png', 'badgetext'=>'You just ran 15 kilometers.'),
        ));
    }
}
