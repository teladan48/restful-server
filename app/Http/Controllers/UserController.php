<?php


namespace App\Http\Controllers;

use App\Entities\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if ($request->user()->cannot('list-user')) {
            abort(403);
        }

        return $this->repository->paginate();
    }

    public function view(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->user()->cannot('view-user')) {
            abort(403);
        }

        return $this->repository->find($id);
    }

    public function listLocation(Request $request)
    {
        if ($request->user()->cannot('list-all-location')) {
            abort(403);
        }

        return $this->repository->all();
    }

    public function updateLocation(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->user()->cannot('update-user-location', $user)) {
            abort(403);
        }

        $user = $this->repository->updateLocation($user, $request->all());

        return $user;
    }

}