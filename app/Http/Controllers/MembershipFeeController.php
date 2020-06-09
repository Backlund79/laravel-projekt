<?php

namespace App\Http\Controllers;

use App\MembershipFee;
use Illuminate\Http\Request;

class MembershipFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $membershipFee = $request->validate([
            'year' => ['required', 'date_format:Y', 'after:2000', 'before:today'],
            'user_id' => ['required', 'exists:App\User,id'],
            'paid' => ['nullable', 'boolean']
        ]);

        $dob = new \DateTime(\App\User::find($request->user_id)->dob);
        $today = new \DateTime();
        $membershipFee['price'] = $dob->diff($today)->y >= 18 ? 500 : 300;
        MembershipFee::create($membershipFee);

        return redirect(route('home'))->with('status', 'Membership fee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MembershipFee  $membershipFee
     * @return \Illuminate\Http\Response
     */
    public function show(MembershipFee $membershipFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembershipFee  $membershipFee
     * @return \Illuminate\Http\Response
     */
    public function edit(MembershipFee $membershipFee)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembershipFee  $membershipFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembershipFee $membershipFee)
    {
        //
    }
}
