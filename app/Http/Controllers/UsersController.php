<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Construct a new instance of the controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['index', 'unpaid', 'show', 'destroy']);
    }

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
        $ids = [];

        foreach($user->teams as $team) {
            array_push($ids, $team->activity->id);
        }

        $activites = \App\Activity::whereNotIn('id', $ids)->get();

        return view('users.show', compact('user', 'activites'));
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
        $user->update(['email' => $request->email]);
        return back();
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

    /**
     * Add relationship to team
     *
     * @param  \App\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attach(User $user, Request $request)
    {
        $user->teams()->attach($request->team_id);
        return back();
    }

    /**
     * Remove relationship to team
     *
     * @param  \App\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detach(User $user, $id)
    {
        $user->teams()->detach($id);
        return back();
    }
}
