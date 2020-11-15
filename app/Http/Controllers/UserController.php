<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::orderby('id', 'DESC')->paginate(5);
        return view('admin.user.index', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name'      =>  'required|min:10|max:35',
            'email'     =>  'required|email|unique:users,email',
            'role'      =>  'required',
            'password'  =>  'required|min:8|max:16',
            'confirm_password'  =>  'required_with:password|same:password'
        ]);
        $User = User::insert([
            'name'      => $request->name,
            'email'     => $request->email,
            'role'      => $request->role,
            'password'  => Hash::make($request->password),
            'created_at'=> Carbon::now()
        ]);

        if($User){
            $notification = array(
                'message'       =>  'User have been created successfull.',
                'alert-type'    =>  'success'
            );
        }

        return redirect()->route('user.index')->with($notification);

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
        $EditUser = User::findOrFail($id);
        return view('admin.user.edit', compact('EditUser'));
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
            'name'      =>  'required|min:10|max:35',
            'email'     =>  'required|email',
            'role'      =>  'required'
        ]);

        $Update = User::where('id', $id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'role'      => $request->role,
            'updated_at'=> Carbon::now()
        ]);

        if($Update){
            $notification = array(
                'message'       =>  'User have been updated successfull.',
                'alert-type'    =>  'success'
            );
        }

        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = User::where('id', $id)->first();
        if($Delete->image){
            unlink(public_path('admin/user-img/'.$Delete->image));
            $Delete = User::where('id', $id)->delete();
            if($Delete){
                $notification = array(
                    'message'       =>  'User have been deleted successfull.',
                    'alert-type'    =>  'success'
                );
            }

            return redirect()->route('user.index')->with($notification);
        }
        else{
            $Delete = User::where('id', $id)->delete();
            if($Delete){
                $notification = array(
                    'message'       =>  'User have been deleted successfull.',
                    'alert-type'    =>  'success'
                );
            }

            return redirect()->route('user.index')->with($notification);
        }
    }
}
