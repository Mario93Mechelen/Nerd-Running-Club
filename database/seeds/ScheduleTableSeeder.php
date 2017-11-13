<?php

use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('schedules')->insert(array(
            array('week'=>1,'goal'=>'Run this week at least 3 miles.', 'completed' => false),
            array('week'=>2,'goal'=>'Run this week at least 5 miles.', 'completed' => false),
            array('week'=>3,'goal'=>'Run this week at least 8 miles.', 'completed' => false),
            array('week'=>4,'goal'=>'Run this week at least 8 miles.', 'completed' => false),
            array('week'=>5,'goal'=>'Run this week at least 10 miles.', 'completed' => false),
            array('week'=>6,'goal'=>'Run this week at least 12 miles.', 'completed' => false),
            array('week'=>7,'goal'=>'Run this week at least 12 miles.', 'completed' => false),
            array('week'=>8,'goal'=>'Run this week at least 14 miles.', 'completed' => false),
            array('week'=>9,'goal'=>'Run this week at least 15 miles.', 'completed' => false),
            array('week'=>10,'goal'=>'Run this week at least 16 miles.', 'completed' => false),

        ));
    }
}
