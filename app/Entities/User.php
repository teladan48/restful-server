<?php

namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function hasPermission($name)
    {
        // @TODO Pindahkan ke Database

        $permissions = [
            'create-event', 'update-event', 'delete-event', 'view-event',
        ];

        return in_array($name, $permissions);
    }
}
