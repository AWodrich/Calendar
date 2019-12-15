<?php

namespace App\Http\Controllers;

use App\SportingEvent;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }




    /**
     * Show sport events.
     *
     * @param  int  $id
     * @return View
     */
    public function index()
    {
        $sport_events = SportingEvent::leftJoin('clubs as home', 'sporting_events._home_id', '=' ,'home.id')
            ->leftJoin('clubs as outward', 'sporting_events._outward_id', '=' ,'outward.id')
            ->leftJoin('disciplines as disc', 'sporting_events._disciplines_id', '=' ,'disc.id')
            ->select('sporting_events.*', 'home.name as home', 'outward.name as outward', 'disc.name as discipline')
            ->orderBy('date','asc')
            ->get();
        return view('index', [
            'sport_events' => $sport_events,
        ]);
    }


}
