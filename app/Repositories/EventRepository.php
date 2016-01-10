<?php


namespace App\Repositories;

use App\Entities\Event;
use App\Entities\User;
use Carbon\Carbon;

class EventRepository
{
    public function all()
    {
        return Event::all();
    }

    public function paginate()
    {
        return Event::paginate();
    }

    public function upcoming()
    {
        return Event::where('event_date', '>=', new Carbon('now'))->paginate();
    }

    public function find($id)
    {
        return Event::findOrFail($id);
    }

    public function create(User $user, array $data)
    {
        $event = new Event($data);
        $event->user()->associate($user);
        $event->save();

        return $event;
    }

    public function update(Event $event, array $data)
    {
        $event->update($data);

        return $event;
    }

    public function delete(Event $event)
    {
        $event_old = $event;

        $event->delete();

        return $event_old;
    }


}