<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
             ['title'=>'Demo Event-1', 'start_date'=>'2019-05-08', 'end_date'=>'2019-05-08'],
             ['title'=>'Demo Event-2', 'start_date'=>'2019-05-09', 'end_date'=>'2019-05-10'],
             ['title'=>'Demo Event-3', 'start_date'=>'2019-05-11', 'end_date'=>'2019-05-18'],
             ['title'=>'Demo Event-3', 'start_date'=>'2019-05-20', 'end_date'=>'2019-05-22'],
        ];

        foreach ($data as $key => $value) {
            Event::create($value);
        }
    }
}
