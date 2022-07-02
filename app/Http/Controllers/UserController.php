<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Gate ;
use Illuminate\Support\MessageBag ;
use App\User ;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // User Type Access Level
        if(Gate::allows('isAdmin')){
            // Create Fake User
            User::factory()->count(1)->create() ;
            // Query To Database
            $users = User::all() ;
            // Return View
            return view('admin.users' , compact('users')) ;
        }
        else{
            abort(403) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // User Type Access Level
        if(Gate::allows('isAdmin')){
            // Delete The Specified User
            $user->delete() ;
            // Success Massage Bag
            $successMsg = [ 'successMsg' => 'Delete User successfully.' ] ;
            $msgBag = new MessageBag($successMsg) ;
            // Return Redirect View
            return redirect()->back()->withErrors($msgBag) ;
        }
        else{
            abort(403) ;
        }
    }
}
