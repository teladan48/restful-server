<?php

namespace App\Http\Controllers;

use Auth;
use App\Entities\Event;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->upcoming();
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'event_date'        => 'required|date',
            'event_description' => 'required',
            'location'          => 'required',
        ]);

        $user = Auth::user();

        return $this->repository->create($user, $request->all());
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if ($request->user()->cannot('update-event', $event)) {
            abort(403);
        }

        $this->validate($request, [
            'name'              => 'required',
            'event_date'        => 'required|date',
            'event_description' => 'required',
            'location'          => 'required',
        ]);

        return $this->repository->update($event, $request->all());
    }

    public function delete(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if ($request->user()->cannot('delete-event', $event)) {
            abort(403);
        }

        return $this->repository->delete($event);
    }
}
