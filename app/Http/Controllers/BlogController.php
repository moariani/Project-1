<?php

namespace App\Http\Controllers ;

use App\Comment ;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\MessageBag ;
use App\Post ;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query To Database
        $newestPosts = Post::orderBy('created_at' , 'desc')->limit(6)->get();
        $posts = Post::orderBy('created_at' , 'desc')->limit(20)->get();
        // Return View
        return view('blog.blog' , compact('newestPosts' , 'posts') ) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $vaildator = Validator::make($request->all()  , [
            'email' =>  ['required' , 'email'] ,
            'body' =>   ['required' , 'min:5'] ,
            'post_id' => ['required']
        ]);
        // Check Fails Validator
        if($vaildator->fails()) {
            return redirect()->back()->withErrors($vaildator) ;
        }
        // Store New Comment
        Comment::create($request->all()) ;
        // Success Massage Bag
        $successMsg = [ 'successMsg' => 'Create Comment successfully.' ] ;
        $msgBag = new MessageBag($successMsg) ;
        // Return Redirect View
        return redirect()->back()->withErrors($msgBag) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Query To Database
        $post = Post::with('user' , 'comments')->find($post->id) ;
        // Return View
        return view('blog.article' , compact('post')) ;
    }
}
