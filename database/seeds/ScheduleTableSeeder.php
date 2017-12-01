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
            array('week'=>1,'goal'=>'Run at least 1 miles.', 'end_date' => '2017-10-15'),
            array('week'=>2,'goal'=>'Run at least 2 miles.', 'end_date' =>'2017-11-05'),
            array('week'=>3,'goal'=>'Run at least 3 miles.', 'end_date' => '2017-11-26'),
            array('week'=>4,'goal'=>'Run at least 4 miles.', 'end_date' => '2017-12-03'),
            array('week'=>5,'goal'=>'Run at least 5 miles.', 'end_date' => '2017-12-24'),
            array('week'=>6,'goal'=>'Run at least 6 miles.', 'end_date' => '2018-01-14'),
            array('week'=>7,'goal'=>'Run at least 7 miles.', 'end_date' => '2018-02-04'),
            array('week'=>8,'goal'=>'Run at least 8 miles.', 'end_date' => '2018-02-25'),
            array('week'=>9,'goal'=>'Run at least 9 miles.', 'end_date' => '2018-03-18'),
            array('week'=>10,'goal'=>'Run at least 10 miles.', 'end_date' => '2018-04-08'),

        ));
    }
}
