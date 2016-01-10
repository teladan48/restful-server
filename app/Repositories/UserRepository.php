<?php


namespace App\Repositories;

use App\Entities\User;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function paginate()
    {
        return User::paginate();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function updateLocation(User $user, array $data)
    {
        $user->location_lat  = $data['location_lat'];
        $user->location_long = $data['location_long'];
        $user->save();

        return $user;
    }
}