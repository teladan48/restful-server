<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'event_date', 'event_description', 'location'
    ];
}