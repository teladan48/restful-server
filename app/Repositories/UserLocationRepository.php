<?php


namespace App\Repositories;

use App\Entities\User;
use App\Entities\UserLocation;

class UserLocationRepository
{
    public function all()
    {
        return UserLocation::all();
    }

    public function update(User $user, array $data)
    {
        if ($user->location) {
            $user_location = $user->location;
        } else {
            $user_location = new UserLocation();
            $user_location->user()->associate($user);
        }

        $user_location->location_lat  = $data['location_lat'];
        $user_location->location_long = $data['location_long'];
        $user_location->save();

        return $user_location;
    }
}