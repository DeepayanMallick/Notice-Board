<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Team;

class NoticesController extends Controller
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
        $notices = Notice::orderBy('created_at', 'desc')->paginate(10);
        return view('notices.index')->with('notices', $notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('notices.create', compact('teams'));
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
            'title' => 'required',
            'body' => 'required',
            'team_id' => 'required',
        ]);

        // Create Notice
        
        $notice = new Notice;
        $notice->title = $request->input('title');
        $notice->body = $request->input('body');
        $notice->team_id = $request->input('team_id');
        $notice->save();

        return redirect('/notices')->with('success', 'Notice Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::find($id);

        if (!isset($notice)){
            return redirect('/notices')->with('error', 'No Notice Found');
        }
        return view('notices.show')->with('notice', $notice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        $teams = Team::all();
        
        if (!isset($notice)){
            return redirect('/notices')->with('error', 'No Notice Found');
        }

        return view('notices.edit', compact('notice', 'teams'));
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
            'title' => 'required',
            'body' => 'required',
            'team_id' => 'required',
        ]);

        // Update Notice
        $notice = Notice::find($id);
        $notice->title = $request->input('title');
        $notice->body = $request->input('body');
        $notice->team_id = $request->input('team_id');
        $notice->save();

        return redirect('/notices')->with('success', 'Notice Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        
        if (!isset($notice)){
            return redirect('/notices')->with('error', 'No Notice Found');
        }

        
        $notice->delete();
        return redirect('/notices')->with('error', 'Notice Removed');
    }
}
