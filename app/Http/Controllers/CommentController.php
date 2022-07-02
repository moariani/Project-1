<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Gate ;
use Illuminate\Support\MessageBag ;
use App\Comment ;
use App\Post ;
use App\User ;


class CommentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // User Type Access Level
        if(Gate::allows('isAdmin')){
            // Create Fake Comment
            Comment::factory()->count(1)->for(Post::factory()->for(User::factory()))->create() ;
            // Query To Database
            $comments = Comment::with('post')->get() ;
            // Return View
            return view('admin.comments' , compact('comments')) ;
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
    public function destroy(Comment $comment)
    {
        // User Type Access Level
        if(Gate::allows('isAdmin')){
            // Delete The Specified Comment
            $comment->delete() ;
            // Success Massage Bag
            $successMsg = [ 'successMsg' => 'Delete Comment successfully.' ] ;
            $msgBag = new MessageBag($successMsg) ;
            // Return Redirect View
            return redirect()->back()->withErrors($msgBag) ;
        }
        else {
            abort(403) ;
        }

    }
}
