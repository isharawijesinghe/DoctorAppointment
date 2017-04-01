<?php

namespace App\Http\Controllers;

use App\DoctorDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Event;
use DateTime;

 
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminCalander()
    {
        $data = [
            'page_title' => 'Events',
            'events'	 => Event::orderBy('id')->get(),
        ];

        return view('event/list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEventCreate()
    {
        $data = [
            'page_title' => 'Add new event',
        ];
        return view('event/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStoreEvent(Request $request)
    {
        $this->validate($request, [
            'register_nb'=>'required',
            'doctor_id'	=> 'required',
            'doctor_name' => 'required',
            'time'	=> 'required ',
            'patient_token'=>'required'
        ]);

        $time = explode(" - ", $request->input('time'));

        $event 					= new Event;
        $event->doctor_id		= $request['doctor_id'];
        $event->doctor_name 	= $request['doctor_name'];
        $event->patient_token   = Input::get('patient_token');
        $event->start_time 		= $this->change_date_format($time[0]);
        $event->end_time 		= $this->change_date_format($time[1]);
        $event->save();

       $request->session()->flash('success', 'The event was successfully saved!');
        return redirect()->route('event/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        $first_date = new DateTime($event->start_time);
        $second_date = new DateTime($event->end_time);
        $difference = $first_date->diff($second_date);

        $data = [
            'page_title' 	=> $event->doctor_name.' schedule',
            'event'			=> $event,
            'duration'		=> $this->format_interval($difference)
        ];

        return view('event/view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $event->start_time =  $this->change_date_format_fullcalendar($event->start_time);
        $event->end_time =  $this->change_date_format_fullcalendar($event->end_time);

        $data = [
            'page_title' 	=> 'Edit '.$event->doctor_name.' schedule',
            'event'			=> $event,
        ];

        return view('event/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'doctor_id'	=> 'required',
            'doctor_name' => 'required',
            'time'	=> 'required'

        ]);

        $time = explode(" - ", $request->input('time'));

        $event 					= Event::findOrFail($id);
        $event->doctor_id		= $request['doctor_id'];
        $event->doctor_name 	= $request['doctor_name'];
        $event->start_time 		= $this->change_date_format($time[0]);
        $event->end_time 		= $this->change_date_format($time[1]);
        $event->save();

        return redirect()->route('event/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if($event){
            $event->delete();
        }


        return redirect()->route('event/list');;
    }

    public function change_date_format($date)
    {
        $time = DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }

    public function change_date_format_fullcalendar($date)
    {
        $time = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $time->format('d/m/Y H:i:s');
    }

    public function format_interval(\DateInterval $interval)
    {
        $result = "";
        if ($interval->y) { $result .= $interval->format("%y year(s) "); }
        if ($interval->m) { $result .= $interval->format("%m month(s) "); }
        if ($interval->d) { $result .= $interval->format("%d day(s) "); }
        if ($interval->h) { $result .= $interval->format("%h hour(s) "); }
        if ($interval->i) { $result .= $interval->format("%i minute(s) "); }
        if ($interval->s) { $result .= $interval->format("%s second(s) "); }

        return $result;
    }

   
}
