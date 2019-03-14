<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getEvents = Event::all();
        $allEvents = [];
        if($getEvents->count()) {
            foreach ($getEvents as $value){
                $allEvents[] = Calendar::event(
                  $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date .'+1 day'),
                    null,
                    [
                        'color' => '#ff0000'
//                        'url' => 'http://full-calendar.io',
                    ]
                );
            }
        }

        $calendar = Calendar::addEvents($allEvents);
        return view('calendar', compact('calendar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        $addCalendar = Event::create(['title'=>$request->name, 'start_date'=> Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d'), 'end_date'=>Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d')]);

        if($addCalendar){
            flash('Operation successful')->success();
            return redirect()->route('products.index');
        }else{
            flash('Operation failed')->error()->important();
            return redirect()->route('products.index');
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
