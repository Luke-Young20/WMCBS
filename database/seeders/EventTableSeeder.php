<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testEvent = new Event;
        $testEvent->title = 'TEST EVENT HARDCODED';
        $testEvent->start = '2022-04-13 10:00:00';
        $testEvent->end = '2022-04-14 10:00:00';
        $testEvent->room ='1';
        $testEvent->userid ='3';
        $testEvent->save();

    

    
        $testEvent = new Event;
        $testEvent->title = 'TEST EVENT HARDCODED NORMAL USER';
        $testEvent->start = '2022-04-15 10:00:00';
        $testEvent->end = '2022-04-15 12:00:00';
        $testEvent->room ='1';
        $testEvent->userid ='1';
        $testEvent->save();
 
    }

}
