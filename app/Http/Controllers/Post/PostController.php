<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\MediaEntity;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required_without:images',
            'images.*' => 'mimes:png,jpeg,jpg|max:1000|required_without:text'
        ]);

        $post = $request->all();
        $post['user_id'] = auth()->user()->id;

        $createdPost = Post::create($post);

        if ($request->hasFile('images')){
            $files = $request->file('images');
            foreach ($files as $file){
                $path = '/media/';
                $filename = time(). '.' . $file->getClientOriginalExtension();
                $img = Image::make($file)->save(public_path($path . $filename));
                if ($img){
                    $media['type'] = 'photo';
                    $media['post_id'] = $createdPost->id;
                    $media['file_name'] = $filename;
                    $media['size'] = $file->getSize();
                    MediaEntity::create($media);
                }
            }
        }
        return back()->with(['success' => 'Your Post was posted successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
