<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipFee extends Model
{
    protected $fillable = ['price', 'year', 'paid', 'user_id'];

    /**
     * Belongs to User
     * 
     * @return \App\User
     */
    public function user() {
        return $this->belongsTo(\App\User::class);
    }
}
