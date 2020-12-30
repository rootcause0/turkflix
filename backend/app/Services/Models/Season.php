<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function show()
    {
      return $this->belongsTo(Show::class);
    }
    public function episodes(){
       return $this->hasMany(Episode::class);
    }
    //
}
