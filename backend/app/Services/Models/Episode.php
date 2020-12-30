<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function seasons(){
        return $this->belongsTo(Season::class);
    }
    //
}
