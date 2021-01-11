<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = ['imdb_id','show_title','original_title','slug','poster','back_poster','youtube_key','release'];
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
    //
}
