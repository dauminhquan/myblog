<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\Users');
    }
    public function field()
    {
        return $this->belongsTo('App\Models\Field');
    }
}
