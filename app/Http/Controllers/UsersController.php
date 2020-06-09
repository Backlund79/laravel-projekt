<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all members
        $users = User::where('admin', false)->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Display a listing of users with unpaid fees.
     *
     * @return \Illuminate\Http\Response
     */
    public function unpaid()
    {
        $unpaid = array_unique(Arr::flatten(\App\MembershipFee::select('user_id')->where('paid', false)->get()->toArray()));
        
        // Get all members
        $users = User::where('admin', false)->whereIn('id', $unpaid)->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'))->with('status', 'Användaren har tagists bort.');
    }
}
