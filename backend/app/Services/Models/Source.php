<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    public function episode(){
        $this->belongsTo(Episode::class);
    }
    //
}
