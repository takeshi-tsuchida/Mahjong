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

        $event_id = DB::transaction( function ($inputs){
            $event = new Event;
            $event = $inputs;
            dd($event);
            $event = $event->save();
            return $event->id;
        });
        dd($event_id);
    }
}
