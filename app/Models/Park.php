<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
