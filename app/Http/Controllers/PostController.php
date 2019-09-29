<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // get the list of post and also the corresponding user owned the post
        $posts = Post::with('user:id,first_name,last_name,middle_name')
            ->paginate(10);
        $data = [
            'posts' => $posts
        ];
        return view('/posts/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $post = new Post(); // initialize new Post eloquent model instance
        $post->title = $request->title;
        $post->message = $request->message;
        $post->user()->associate(Auth::user()); // specify the corresponding user owned the post
        if($request->hasFile('cover_image')) { // if request also submitted cover image for the post
            // Get the file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            $post->cover_image = $fileNameToStore;
        } else {
            $post->cover_image = 'noimage.jpg';
        }
        if($post->save()) {

            return redirect()->back()->with(['success' => 'NEW POST SUCCESSFULLY SAVED']);
        } else {
            return redirect()->back()->withErrors(['errors' => 'POST FAILED TO SAVE']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = Post::where('id', $id)
            ->with('user:id,first_name,last_name,middle_name')
            ->get()->first();
        $createdBy = $post->user->first_name." "
            .substr($post->user->middle_name, 0, 1).". "
            .$post->user->last_name;
        $coverImage = "/storage/cover_images/$post->cover_image";
        $data = [
            'post' => $post,
            'coverImage' => $coverImage,
            'createdBy' => ucwords(strtolower($createdBy), ' ')
        ];
        return view('/posts/show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        $data = [
            'post' => $post
        ];
        return view('/posts/edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->message = $request->message;
        if($request->hasFile('cover_image')) {

            if($post->cover_image != 'noimage.jpg') {
                //Delete Image
                dd(Storage::delete('public/cover_images/'.$post->cover_image));
            }
            // Get the file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get just file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = time().'.'.$extension;
            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect()->back()->with('success', 'POST SUCCESSFULLY UPDATED');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
