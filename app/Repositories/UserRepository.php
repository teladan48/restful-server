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
}