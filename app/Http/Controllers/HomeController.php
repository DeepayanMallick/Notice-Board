<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notice;

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

        $team_id = auth()->user()->team_id; 
       // $notices = Notice::where('team_id', $team_id)->get();

       // $notices_for_all = Notice::where('team_id', 5)->get();

        $notices = Notice::whereIn('team_id', [$team_id, 5])->get();

       


        return view('home', compact('notices'));
    }

    /*****************************
    #@DM_20190712
    # 
    
    *************************** */

    public function create( Request $request)
    {
        # Take Request Parameters
        # Do Validation
        # Send error message if not valid
        # Make Model object for database with inputs
        # Store into database
        # send success message



    }



}
