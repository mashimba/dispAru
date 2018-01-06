<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function setFirstNameAttribute($value)
    {
    	$this->attributes['first_name'] = ucfirst($value);
    }

    public function setMiddleNameAttribute($value)
    {
    	$this->attributes['middle_name'] = ucfirst($value);
    }

    public function setLastNameAttribute($value)
    {
    	$this->attributes['last_name'] = ucfirst($value);
    }
}
