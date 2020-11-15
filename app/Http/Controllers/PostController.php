<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\PostTag;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PostTag = PostTag::all();
        $Post = Post::orderby('id', 'DESC')->paginate(10);
        return view('admin.post.index', compact('Post','PostTag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Category::all();
        $Tag = Tags::all();
        return view('admin.post.create', compact('Category','Tag'));
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
            'title'         => 'required|unique:posts,title',
            'category'      => 'required',
            'post_tag'      => 'required',
            'description'   => 'required',
            'post_image'    => 'required',
        ]);

        if(!empty($request->hasFile('post_image'))){
            $img = $request->file('post_image');
            $imageName = $request->title.'-'.md5(time()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('admin/post-img/'), $imageName);
        }

        $Post = Post::create([
            'title'     =>  $request->title,
            'slug'      =>  Str::of($request->title)->slug('-'),
            'image'     =>  $imageName,
            'description'     =>  $request->description,
            'category_id'     =>  $request->category,
            'user_id'     =>  Auth::user()->id,
            'publish_at'  =>  Carbon::now()
        ]);

        $PostTag = $request->post_tag;
        if(!empty($PostTag)){
            foreach($PostTag as $value)
            PostTag::create([
                'post_id'   =>  $Post->id,
                'tag_id'    =>  $value
            ]);
        }

        if ($Post) {
            $notification = array(
                'message' => 'Post have been insert Successfull.',
                'alert-type' => 'success'
            );
            return redirect()->route('posts.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Post = Post::findOrFail($id);
        return view('admin.post.view', compact('Post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tag = Tags::all();
        $tags = PostTag::all();
        $Category = Category::all();
        $Post = Post::findOrFail($id);
        return view('admin.post.edit', compact('Post','Category','Tag','tags'));
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
        $request->validate([
            'title'         => 'required|unique:posts,title',
            'category'      => 'required',
            'post_tag'      => 'required',
            'description'   => 'required',
            'New_image'     => 'required'
        ]);
        $images = $request->old_image;
        if($images){
            unlink(public_path('admin/post-img/'.$images));
        }

        if($request->hasFile('New_image')){
            $img = $request->file('New_image');
            $imageName = $request->title.'-'.md5(time()).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('admin/post-img/'), $imageName);
        }

        $Post = Post::findOrFail($id)->update([
            'title'     =>  $request->title,
            'slug'      =>  Str::of($request->title)->slug('-'),
            'image'     =>  $imageName,
            'description'     =>  $request->description,
            'category_id'     =>  $request->category,
            'user_id'     =>  Auth::user()->id,
            'publish_at'  =>  Carbon::now()
        ]);

        $PostTag = $request->post_tag;
        if(!empty($PostTag)){
            PostTag::where('post_id', $id)->delete();
        }

        if(!empty($PostTag)){
            foreach($PostTag as $value)
            PostTag::create([
                'post_id'   =>  $id,
                'tag_id'    =>  $value
            ]);
        }

        if ($Post) {
            $notification = array(
                'message' => 'Post have been updated Successfull.',
                'alert-type' => 'success'
            );
            return redirect()->route('posts.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PostId = Post::findOrFail($id);
        if($PostId){
            unlink(public_path('admin/post-img/'.$PostId->image));
        }
        $Delete = Post::findOrFail($id)->delete();
        $Delete = PostTag::where('post_id',$id)->delete();
        if ($Delete) {
            $notification = array(
                'message' => 'Post have been deleted Successfull.',
                'alert-type' => 'success'
            );
            return redirect()->route('posts.index')->with($notification);
        }
    }
}
