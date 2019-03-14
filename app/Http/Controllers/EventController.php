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
                        'color' => '#ff0000',
                        'url' => 'http://127.0.0.1:8000/events/'.$value->id
                    ]
                );
            }
        }

        $calendar = Calendar::addEvents($allEvents);
        return view('calendar', compact('calendar'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event){
        return view('edit', compact('event'));
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

        $addCalendar = Event::create(['title'=>$request->title, 'start_date'=> $request->start_date , 'end_date'=>$request->end_date]);

        if($addCalendar){
            flash('Operation successful')->success();
            return redirect()->route('index');
        }else{
            flash('Operation failed')->error()->important();
            return redirect()->route('index');
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
