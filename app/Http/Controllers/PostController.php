<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\TagType;
use App\Models\User;
use App\View\Components\PaintBlock;
use Illuminate\Http\Request;
use DB;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tagTypes = TagType::all();
        return view('post.create', ['tagTypes' => $tagTypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required'],
        ]);

        $post = Post::make([
            'title' => request('title'),
            'description' => request('description'),
            'published' => 1,
            'public' => 1,
            'user_id' => auth()->id(),
            'NSFW' => 0
        ]);
        $post->save();

        if (request('image')) {
            $image = request('image');
            $filename = $image;
            $imageObject = Image::make(['path' => '/uploads/' . $filename, 'post_id' => $post->id]);
            app('debugbar')->error($imageObject);

            Storage::put($image, $image);

            $imageObject->save();
        };

        return redirect('/gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $tagTypes = TagType::all();

        $comments = Comment::with('user')->with('comments')->where('post_id', $post->id)->where('parent_id', '=', null)->get();

        return view('post.show', ['post' => $post, 'tagTypes' => $tagTypes, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
