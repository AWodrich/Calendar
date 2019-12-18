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
     * @param int $id
     *
     * @return View
     */
    public function index()
    {
        // two possible ways to retrieve data from db and handle relations

        // 1. way
        // $sport_events = SportingEvent::leftJoin('clubs as home', 'sporting_events._home_id', '=', 'home.id')
        //                              ->leftJoin('clubs as outward', 'sporting_events._outward_id', '=', 'outward.id')
        //                              ->leftJoin('disciplines as disc', 'sporting_events._discipline_id', '=', 'disc.id')
        //                              ->select('sporting_events.*', 'home.name as home', 'outward.name as outward',
        //                                  'disc.name as discipline')
        //                              ->orderBy('date', 'asc')
        //                              ->get();

        // 2. way
        $sport_events = SportingEvent::with("hometeam", 'outwardteam', 'discipline')
                                     ->orderBy('date', 'asc')
                                     ->get();


        return view('index', [
            'sport_events' => $sport_events,
        ]);
    }

    public function admin()
    {
        $sport_events = SportingEvent::with("hometeam", 'outwardteam', 'discipline')
                                     ->orderBy('date', 'asc')
                                     ->get();

        return view('admin', [
            'sport_events' => $sport_events,
        ]);
    }


    public function delete($id)
    {

        $sport_events = SportingEvent::where('id','=', $id)
                                     ->delete();

        return view('admin', [
            'sport_events' => $sport_events,
        ]);
    }


    public function create()
    {

        $sport_events = SportingEvent::where('id','=', $id)
                                     ->delete();

        return view('admin', [
            'sport_events' => $sport_events,
        ]);
    }

}
