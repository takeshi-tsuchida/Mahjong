<?php

namespace App\Http\Controllers;

use http\Env\Response;
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

        return redirect("/mahjong/events/{$event_id}/edit");
    }

    public function getEdit(int $event_id)
    {
        $event = Event::getDetailById($event_id);

        return view('events.edit',compact($event));
    }

    public function postEdit(Request $request, int $event_id)
    {
        $inputs = $request::all();
        unset($inputs['_token']);

        DB::transaction( function () use ($inputs, $event_id) {
            $event = (new Event()) -> findOrFail($event_id);
            $event->update($inputs);
            return;
        });

        return redirect("/mahjong/events/{$event_id}/edit");
    }
}
