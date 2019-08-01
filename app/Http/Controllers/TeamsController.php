<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'team_name' => 'required',
            'team_id' => 'required',
        ]);

        // Create Notice
        $team = new Team;
        $team->team_name = $request->input('team_name');
        $team->team_id = $request->input('team_id');
        $team->save();

        return redirect('/teams')->with('success', 'Team Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        if (!isset($team)){
            return redirect('/teams')->with('error', 'No Team Found');
        }

        // return view('teams.edit')->with('team', $team);
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'team_name' => 'required',
            'team_id' => 'required',
        ]);

        // Update Notice
        $team = Team::find($id);
        $team->team_name = $request->input('team_name');
        $team->team_id = $request->input('team_id');
        $team->save();

        return redirect('/teams')->with('success', 'Team Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        
        if (!isset($team)){
            return redirect('/teams')->with('error', 'No Team Found');
        }

        
        $team->delete();
        return redirect('/teams')->with('error', 'Team Removed');
    }
}
