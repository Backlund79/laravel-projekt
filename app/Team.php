<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['activity_id', 'teamName'];

    /**
     * Relations to Users
     * 
     * @return \App\User
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    /**
     * Relations to Activity
     * 
     * @return \App\Activity
     */
    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }
}
