<?php

namespace App\Http\Controllers\VetvineUsers\EventManagement;

use App\Http\Controllers\Controller;
use App\Models\Admins\Webinar\Event;
use App\Models\VetvineUsers\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalandarEventsController extends Controller
{
    public function index(Request $request)
    {
        $eventName = "Vetvine event one!";
        if($request->ajax()) {
            $data = CalendarEvent::whereDate('event_start', '>=', $request->start)
                ->whereDate('event_end',   '<=', $request->end)->where('user_id', Auth::user()->id)
                ->get(['id', 'event_name', 'event_start', 'event_end']);
            return response()->json($data);
        }else{
            $eventData = CalendarEvent::where('user_id', Auth::user()->id)
            ->get(['id', 'event_name', 'event_start', 'event_end'])->toarray();
        }
        return view('testCalandarEvent', compact('eventData'));
    }

    public function addVetvineEvent(Request $request){
        $user = Auth::user();
        $events = $user->sheduledEvents;
        $addEvent = true;
        $code = 200;
        $message = '';
        $event = Event::find($request->event_id);

        foreach($events->toArray() as $event){
            if($event['event_id'] == $request->event_id){
                $code = 400;
                $message = 'This Event is already added to your calendar!';
                $addEvent = false;
                break;
            }
        }

        $specificEvent = Event::where('id', $request->event_id)->first();

        if($addEvent){
            CalendarEvent::create([
                'user_id' => Auth::user()->id,
                'event_id' => $request->event_id,
                'event_name' => $specificEvent->event_title,
                'event_start' => date('Y-m-d H:i:s', strtotime(''.$specificEvent->date.''.$specificEvent->time.'')),
                'event_end' => date('Y-m-d H:i:s', strtotime(''.$specificEvent->date.''.$specificEvent->time.'')),
            ]);
            $code = 200;
            $message = 'Event added to calendar successfully!';
        }

        $eventData = CalendarEvent::where('user_id', Auth::user()->id)
        ->get(['id', 'event_name', 'event_start', 'event_end'])->toarray();

        return response()->json([
            'code' => $code,
            'message' => $message,
            'html' => view('testCalandarEvent', compact('eventData'))->render(),
        ]);
    }

    public function calendarEvents(Request $request)
    {

        switch ($request->type) {
           case 'create':
              $event = CalendarEvent::create([
                  'user_id' => Auth::user()->id,
                  'event_name' => $request->event_name,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);

              return response()->json($event);
             break;

           case 'edit':
              $event = CalendarEvent::where('id',$request->id)->where('user_id', Auth::user()->id)->update([
                  'event_name' => $request->event_name,
                  'event_start' => $request->event_start,
                  'event_end' => $request->event_end,
              ]);

              return response()->json($event);
             break;

           case 'delete':
              $event = CalendarEvent::where('id',$request->id)->where('user_id', Auth::user()->id)->delete();

              return response()->json($event);
             break;

           default:
             # ...
             break;
        }
    }
}
