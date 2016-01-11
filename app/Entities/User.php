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
        'api_token', 'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token'
    ];

    /**
     * Relasi One to Many User ke Events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Relasi One to One User ke User Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location()
    {
        return $this->hasOne(UserLocation::class);
    }

    /**
     * Untuk check role yang dimiliki User
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        return true;
    }

    /**
     * Untuk check permission yang dimiliki User
     *
     * @param $name
     * @return bool
     */
    public function hasPermission($name)
    {
        // @TODO Pindahkan ke Database

        $permissions = [
            'list-event', 'create-event', 'update-event', 'delete-event', 'view-event',
            'list-user', 'view-user',
            'update-user-location', 'list-user-location',
        ];

        return in_array($name, $permissions);
    }
}
