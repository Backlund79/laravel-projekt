<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::paginate(25);
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = \App\Activity::all();
        return view('teams.create', compact('activities'));
    }

    /**
     * Store new teams
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Team::create($request->validate([
            'teamName' => ['required', 'string', 'max:255'],
            'activity_id' => ['required', 'exists:App\Activity,id']
        ]));

        return redirect(route('teams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect(route('teams.index'))->with('status', 'Laget har tagists bort.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function detach(Team $team, $id)
    {
        $team->users()->detach($id);
        return back();
    }

    /**
     * JSON fetch teams by Activity
     *
     * @param Int $id Activity id
     *
     * @return \Illuminate\HTTP\JsonResponse
     */
    public function teamsByActivity($id) {
        $teams = Team::where('activity_id', $id)->orderBy('teamName', 'asc')->get();

        return response()->json($teams);
    }
}
