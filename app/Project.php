<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = 'projects';

    public function belongsToResume()
    {
        return $this->belongsTo('App\Resume', 'resumeId', 'id');
    }

}