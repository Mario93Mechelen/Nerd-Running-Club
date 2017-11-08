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
            array('badgename'=>'first_badge_time','badgeurl'=>'img/icons/time-badge-1.png'),
            array('badgename'=>'second_badge_time','badgeurl'=>'img/icons/time-badge-2.png'),
            array('badgename'=>'third_badge_time','badgeurl'=>'img/icons/time-badge-3.png'),
            array('badgename'=>'first_badge_friend','badgeurl'=>'img/icons/friends-badge-1.png'),
            array('badgename'=>'second_badge_friend','badgeurl'=>'img/icons/friends-badge-2.png'),
            array('badgename'=>'third_badge_friend','badgeurl'=>'img/icons/friends-badge-3.png'),
            array('badgename'=>'first_badge_miles','badgeurl'=>'img/icons/miles-badge-1.png'),
            array('badgename'=>'second_badge_miles','badgeurl'=>'img/icons/miles-badge-2.png'),
            array('badgename'=>'third_badge_miles','badgeurl'=>'img/icons/miles-badge-3.png'),
            array('badgename'=>'first_badge_run','badgeurl'=>'img/icons/run-badge-1.png'),
            array('badgename'=>'second_badge_run','badgeurl'=>'img/icons/run-badge-2.png'),
            array('badgename'=>'third_badge_run','badgeurl'=>'img/icons/run-badge-3.png'),

        ));

        DB::table('userbadges')->insert(array(
            array('user_id' => 1, 'badge_id' => 1 ),
        ));
    }
}
