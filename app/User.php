<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'dob', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The fullname of the user
     * 
     * @return String Fullname
     */
    public function fullname() {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * Checks if user is Admin
     * 
     * @return Bool
     */
    public function isAdmin() {
        return $this->admin;
    }

    /**
     * One to many relationship to MembershipFee
     * 
     * @return \App\MembershipFee Array
     */
    public function membershipFees() {
        return $this->hasMany(\App\MembershipFee::class)->orderBy('year', 'asc');
    }

    /**
     * Paid Membership Fees
     * 
     * @return \App\MembershipFee Array
     */
    public function paidFees()
    {
        return $this->hasMany(\App\MembershipFee::class)->where('paid', true)->orderBy('year', 'asc');
    }

    /**
     * Unpaid Membership Fees
     * 
     * @return \App\MembershipFee Array
     */
    public function unpaidFees()
    {
        return $this->hasMany(\App\MembershipFee::class)->where('paid', false)->orderBy('year', 'asc');
    }

    /**
     * Unpaid Membership Fees
     * 
     * @return \App\MembershipFee Array
     */
    public function unpaidFeesCount()
    {
        return $this->hasMany(\App\MembershipFee::class)->where('paid', false)->count();
    }
}
