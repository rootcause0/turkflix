<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
    //
}
