<?php

namespace App\Http\Controllers;

use App\SportingEvent;
use App\Club;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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


    public function delete($id, Response $response)
    {

        SportingEvent::where('id', '=', $id)
                     ->delete();

        return response()->json(['response' => $response], 204);
    }


    public function create(Request $request)
    {
        $homeTeam = new Club;
        $homeTeam->name = $request->input('home_team');
        $homeTeam->save();

        $outwardTeam = new Club;
        $outwardTeam->name = $request->input('outward_team');
        $outwardTeam->save();

        $event = new SportingEvent;
        $event->date = Carbon::parse($request->input('date'));
        $event->time = $request->input('time');
        $event->referee = $request->input('referee');
        $event->location = $request->input('location');
        $event->_home_id = $homeTeam->id;
        $event->_outward_id = $outwardTeam->id;
        $event->_discipline_id = $request->input('discipline_id');

        $event->save();

        return response()->json(['event' => $event], 201);
    }

}
