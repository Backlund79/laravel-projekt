<?php

namespace App\Http\Controllers;

use App\MembershipFee;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $dt = new DateTime();

        $paidFees = MembershipFee::select('year', DB::raw('COUNT(id) as total'), DB::raw('SUM(price) as sum'))
            ->where('paid', true)
            ->where('year', $dt->format('Y'))
            ->groupBy('year')
            ->first();
        $unpaidFees = MembershipFee::select('year', DB::raw('COUNT(id) as total'), DB::raw('SUM(price) as sum'))
            ->where('paid', false)
            ->where('year', $dt->format('Y'))
            ->groupBy('year')
            ->first();

        return view('home', compact('paidFees', 'unpaidFees'));
    }
}
