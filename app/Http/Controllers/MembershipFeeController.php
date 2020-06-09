<?php

namespace App\Http\Controllers;

use App\MembershipFee;
use Illuminate\Http\Request;

class MembershipFeeController extends Controller
{
    /**
     * Initialize a new instance of the controller
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MembershipFee  $membershipFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembershipFee $membershipFee)
    {
        $membershipFee->update(['paid' => true]);

        return back();
    }
}
