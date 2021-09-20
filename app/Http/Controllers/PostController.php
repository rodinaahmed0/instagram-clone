<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::findOrFail(Auth::user()->id);
        $id = Auth::user()->id;


    $posts = Post::whereIn('user_id', function($query) use($id)
    {
      $query->select('follow_id')
            ->from('follows')
            ->where('user_id', $id);
    })->orWhere('user_id', $id)->latest()->get();
    $data['posts'] = $posts;

    return view('home')->with($data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user'] = User::findOrFail(Auth::user()->id) ;
        return view('post.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'caption' => 'string|nullable|max:100',
                'image' => 'image|mimes:png,jpg,jpeg'
            ]
            );
       $id = Auth::user()->id;
       $user = User::findOrFail($id);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $name = 'post-'.$user->username .'-'.uniqid() . ".$extension";

        $image->move('images/posts/' , $name);
        Post::create(
            [
                'image' => $name,
                'caption' => $request->caption,
                'user_id' => Auth::user()->id
            ]
        );


        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['post'] = Post::findOrFail($id);

        return view('post.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function save($id)
    {
        $user_id = Auth::user()->id;
        DB::table('saves')->insert(
            [
                'user_id' => $user_id,
                'post_id' => $id
            ]
            );

         return redirect(route('user.profile' , $user_id));

    }
    public function unsave($id)
    {
        $user_id = Auth::user()->id;
        DB::table('saves')->where( 'user_id',$user_id)->where('post_id',$id)->delete();

         return redirect(route('user.profile' , $user_id));

    }

    public function like($id)
    {
        $user_id = Auth::user()->id;
        DB::table('likes')->insert(
            [
                'user_id' => $user_id,
                'post_id' => $id
            ]
            );

        return redirect(route('home'));

    }
    public function unlike($id)
    {
        $user_id = Auth::user()->id;
        DB::table('likes')->where( 'user_id',$user_id)->where('post_id',$id)->delete();

        return redirect(route('home'));

    }

    public function comment(Request $request, $id)
    {

        $request->validate(
            ['comment'=> 'string|required|max:50']
        );
        $user_id = Auth::user()->id;
        DB::table('comments')->insert(
            [
                'user_id' => $user_id,
                'post_id' => $id,
                'comment' => $request->comment
            ]
            );

         return redirect(route('post.show' , $id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect(route('home'));
    }
}
