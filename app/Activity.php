<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * Relations to Teams
     * 
     * @return \App\Team
     */
    public function teams()
    {
        return $this->hasMany('App\Team');
    }
}
