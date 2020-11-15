<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tags;
use Session;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $Tags = Tags::orderby('id','DESC')->paginate(5);
        return view('admin.tag.index',compact('Tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'name' => 'required|unique:tags'
        ]);

        $Tags = Tags::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'description' => $request->description
        ]);
        if ($Tags) {
            $notification = [
                'message' => 'Tag Data Inserted !',
                'alert-type' => 'success'
            ];
            return redirect()->route('tags.index')->with($notification);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tags = Tags::find($id);
        return view('admin.tag.edit', compact('Tags'));
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
            'name' => 'required|unique:tags'
        ]);

        $Tags = Tags::find($id)->update([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'description' => $request->description
        ]);
        if ($Tags) {
            $notification = [
                'message' => 'Tag Data Updated !',
                'alert-type' => 'success'
            ];
            return redirect()->route('tags.index')->with($notification);
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
        $Tags = Tags::find($id)->delete();

        if ($Tags) {
            $notification = [
                'message' => 'Tag Data Deleted !',
                'alert-type' => 'error'
            ];
            return redirect()->route('tags.index')->with($notification);
        }
    }
}
