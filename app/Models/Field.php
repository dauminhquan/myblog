<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function topic()
    {
        return $this->hasMany('App\Models\Topic','field_id');
    }
}
