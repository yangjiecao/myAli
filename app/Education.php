<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    public function belongsToResume()
    {
        return $this->belongsTo('App\Resume', 'resumeId', 'id');
    }

}