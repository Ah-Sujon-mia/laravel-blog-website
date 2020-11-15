<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::orderby('id','DESC')->paginate(10);
        return view('admin.category.index', compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:categories'
        ]);

        $Category = Category::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'description' => $request->description
        ]);

        if ($Category) {
            $notification = array(
                'message' => 'Category Data Inserted !',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);
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
        $Category = Category::find($id);
        return view('admin.category.view', compact('Category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category = Category::find($id);
        return view('admin.category.edit', compact('Category'));
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
            'name' => 'required|unique:categories'
        ]);

       $Category = Category::findOrFail($id)->update([
            'name'  => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'description' => $request->description
       ]);

       if ($Category) {
            $notification = array(
                'message' => 'Category Data Updated !',
                'alert-type' => 'success'
            );
            return redirect()->route('category.index')->with($notification);
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
        $Delete = Category::find($id)->delete();
        if ($Delete) {
           $notification = array(
                'message' => 'Category Deleted Successfull !',
                'alert-type' => 'error'
            );
            return redirect()->route('category.index')->with($notification);
        }
    }
}
