<?php

namespace App\Http\Controllers\Front;

use Calendar;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];

        $data = Event::all();

        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    0,
                    // Add color and link on event
                    [
                      'color' => '#f05050',
                      'url' => url('/'),
                    ]
                );
            }
        }

        Calendar::setId('reservation');
        $calendar = Calendar::addEvents($events);
        return view('front.home.home', compact('calendar'));
    }
}
