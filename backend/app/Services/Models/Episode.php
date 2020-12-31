<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function sources()
    {
       return $this->hasMany(Source::class);
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class);
    }
    //
}
