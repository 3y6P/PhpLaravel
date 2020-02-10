<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['image', 'goal', 'user_id', 'type_id', 'status_id', 'day_id', 'shedule_id', 'location_id', 'address_id', 'education_id'];
}
