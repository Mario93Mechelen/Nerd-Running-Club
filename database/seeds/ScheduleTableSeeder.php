<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
        //$distances = [0=>1610,1=>3220,2=>4830,3=>6440,4=>8050,5=>9660,6=>11230,7=>12870,8=>14490,9=>16100];
        $distances = $this->createDistanceArray();
        $dates = $this->createDateArray();
        $end_date = strtotime('+1 year',$dates[0]);
        DB::table('schedules')->insert(array(
            array('week'=>1,'goal'=>'Run at least 0.5 miles.', 'end_date' => Carbon::parse(date('Y-m-d', $dates[0])), 'distance' => $distances[0], 'xpPoints'=>10),
            array('week'=>2,'goal'=>'Run at least 1 mile.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[1])), 'distance' => $distances[1], 'xpPoints'=>20),
            array('week'=>3,'goal'=>'Run at least 1.5 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[2])), 'distance' => $distances[2], 'xpPoints'=>30),
            array('week'=>4,'goal'=>'Run at least 2 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[3])), 'distance' => $distances[3], 'xpPoints'=>40),
            array('week'=>5,'goal'=>'Run at least 2.5 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[4])), 'distance' => $distances[4], 'xpPoints'=>50),
            array('week'=>6,'goal'=>'Run at least 3 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[5])), 'distance' => $distances[5], 'xpPoints'=>60),
            array('week'=>7,'goal'=>'Run at least 4 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[6])), 'distance' => $distances[6], 'xpPoints'=>70),
            array('week'=>8,'goal'=>'Run at least 5 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[7])), 'distance' => $distances[7], 'xpPoints'=>80),
            array('week'=>9,'goal'=>'Run at least 7 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[8])), 'distance' => $distances[8], 'xpPoints'=>90),
            array('week'=>10,'goal'=>'Run at least 10 miles.', 'end_date' => Carbon::parse(date('Y-m-d',$dates[9])), 'distance' => $distances[9], 'xpPoints'=>100),
            array('week'=>11,'goal'=>'Go for the 10 miles!', 'end_date' => Carbon::parse(date('Y-m-d',$end_date)), 'distance' => $distances[9], 'xpPoints'=>120),

        ));
    }

    public function createDateArray(){
        $dateArray = array();
        $yearnow = date('Y');
        $yearnext = date('Y',strtotime('+1 year'));
        $start_date_time = strval("first Sunday of September " . $yearnow);
        $end_date_time = strval('fourth Sunday of April '.$yearnext);
        $start_date = Carbon::parse(date('Y-m-d',(strtotime($start_date_time))));
        $end_date = Carbon::parse(date('Y-m-d',(strtotime($end_date_time))));
        $diff = $end_date->diffInSeconds($start_date);
        $achievementTime = $diff/10;
        $amountTime=0;
        for($i=0;$i<10;$i++) {
            $amountTime+=$achievementTime;
            $new_date = strtotime('+'.$amountTime." Seconds",strtotime($start_date_time));
            $dateArray[$i] = $new_date;
        }
        return $dateArray;
    }

    public function createDistanceArray(){
        $startDistance = 16093.44/10;
        $distanceArray = array();
        $newdistance=0;
        for($i=0;$i<10;$i++){
            $newdistance+=$startDistance;
            $distanceArray[$i] = $newdistance;
        }
        return $distanceArray;
    }
}
