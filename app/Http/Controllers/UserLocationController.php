<?php


namespace App\Http\Controllers;

use App\Entities\User;
use App\Repositories\UserLocationRepository;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    protected $repository;

    public function __construct(UserLocationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->user()->cannot('list-user-location')) {
            abort(403);
        }

        return $this->repository->all();
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        if ($request->user()->cannot('update-user-location', $user)) {
            abort(403);
        }

        $this->validate($request, [
            'location_lat'  => 'required',
            'location_long' => 'required',
        ]);

        return $this->repository->update($user, $request->all());
    }
}