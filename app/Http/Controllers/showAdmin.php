<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth ;

class showAdmin extends Controller
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
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Find The Current User
        $currentUser = Auth::user() ;
        // Return View
        return view('admin.admin' , compact('currentUser')) ;
    }
}
