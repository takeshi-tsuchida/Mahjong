<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;

class EventsController extends Controller
{
    public function getIndex()
    {
        return view('events.index');
    }

    public function getCreate()
    {
        return view('events.create');
    }

    public function postCreate(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);

        $event_id = DB::transaction( function () use ($inputs){
            $event = new Event($inputs);
            dd($event);
            $event->save();
            return $event->id;
        });

        return redirect("events.{$event_id}.edit");
    }

    public function getEdit(int $event_id)
    {
        $event = Event::getDetailById($event_id);

        return view('events.edit',compact($event));
    }
}
