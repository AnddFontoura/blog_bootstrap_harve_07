<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $postId = null)
    {
        $post = null;

        if ($postId) {
            $post = Post::where('id', $postId)->first();
        }

        return view('post.form', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $postId = null)
    {
        if ($postId) {
            $this->validate($request, [
                'postName' => 'required|string|min:1|max:254',
                'postContent' => 'required|string|min:1|max:10000'
            ]);
        } else {
            $this->validate($request, [
                'postName' => 'required|string|min:1|max:254|unique:posts,name',
                'postContent' => 'required|string|min:1|max:10000'
            ]);
        }

        $name = $request->post('postName');
        $content = $request->post('postContent');

        if ($postId) {
            Post::where('id', $postId)->update([
                'user_id' => Auth::user()->id,
                'name' => $name,
                'content' => $content
            ]);
        } else {

            Post::create([
                'user_id' => Auth::user()->id,
                'name' => $name,
                'content' => $content
            ]);
        }

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function view(int $postId)
    {
        $post = Post::where('id', $postId)->first();
        
        return view('post.view', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|int'
        ]);

        $postId = $request->post('id');

        Post::where('id', $postId)->delete();

        return response()->json();
    }
}
