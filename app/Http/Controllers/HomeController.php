<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paid = \App\MembershipFee::where('paid', true);
        $unpaid = \App\MembershipFee::where('paid', false);
        $membershipFees = [
            'paid' => [
                'count' => $paid->count(),
                'sum' => $paid->sum('price')
            ],
            'unpaid' => [
                'count' => $unpaid->count(),
                'sum' => $unpaid->sum('price')
            ]
        ];
        return view('home', compact('membershipFees'));
    }
}
