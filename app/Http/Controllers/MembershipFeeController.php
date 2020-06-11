<?php

namespace App\Http\Controllers;

use App\MembershipFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembershipFeeController extends Controller
{
    /**
     * Initialize a new instance of the controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all fees grouped by year
        $paidFees = MembershipFee::select('year', DB::raw('COUNT(id) as total'), DB::raw('SUM(price) as sum'))
            ->where('paid', true)
            ->groupBy('year')
            ->get();
        $unpaidFees = MembershipFee::select('year', DB::raw('COUNT(id) as total'), DB::raw('SUM(price) as sum'))
            ->where('paid', false)
            ->groupBy('year')
            ->get();

        return view('membershipFee.index', compact('paidFees', 'unpaidFees'));
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
