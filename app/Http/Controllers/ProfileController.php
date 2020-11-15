<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // user profile
    public function profile(){
       $User = Auth::user();
       return view('admin.user.profile.index', compact('User'));
    }

    // user profile update
    public function profileStore(Request $request){
        $UserUpdate = Auth::user();
        $images = $UserUpdate->image;

        $request->validate([
            'name'          =>  'required|min:10|max:35',
            'gender'        =>  'required',
            'your_bio'      =>  'required',
            'profile_image' =>  'required'
        ]);

        if($images){
            unlink(public_path('admin/user-img/'.$images));

            if($request->hasFile('profile_image')){
                $img = $request->file('profile_image');
                $imageName = $request->name.'-'.md5(time()).'.'.$img->getClientOriginalExtension();
                $img->move(public_path('admin/user-img/'), $imageName);
            }

            $Update = User::where('id', $UserUpdate->id)->update([
                'name'          => $request->name,
                'gender'        => $request->gender,
                'description'   => $request->your_bio,
                'image'         => $imageName,
                'updated_at'    => Carbon::now()
            ]);

            if($Update){
                $notification = array(
                    'message'       =>  'Your profile updated successfull.',
                    'alert-type'    =>  'success'
                );
            }
            return redirect()->route('profile')->with($notification);

        }
        elseif($images == NULL){
            if($request->hasFile('profile_image')){
                $img = $request->file('profile_image');
                $imageName = $request->name.'-'.md5(time()).'.'.$img->getClientOriginalExtension();
                $img->move(public_path('admin/user-img/'), $imageName);
            }

            $Updates = User::where('id', $UserUpdate->id)->update([
                'name'          => $request->name,
                'gender'        => $request->gender,
                'description'   => $request->your_bio,
                'image'         => $imageName,
                'updated_at'    => Carbon::now()
            ]);

            if($Updates){
                $notification = array(
                    'message'       =>  'Your profile updated successfull.',
                    'alert-type'    =>  'success'
                );
            }

            return redirect()->route('profile')->with($notification);

        }

    }

    // password pages
    public function password(){
        $User = Auth::user();
        return view('admin.user.profile.password', compact('User'));
    }

    // user password change
    public function changePassword(Request $request) {
        $UserId = Auth::user()->id;
        $Password = Auth::user()->password;

        $request->validate([
            'old_password'  =>  'required',
            'new_password'  =>  'required|min:8|max:16',
            'confirm_password'  => 'required_with:new_password|same:new_password'
        ]);

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $confirm_password = $request->confirm_password;

        if(Hash::check($old_password, $Password)){
            $PasswordChange = User::find($UserId)->update([
                'password'  =>  Hash::make($new_password)
            ]);
            Auth::logout();
            if($PasswordChange){
                $notification = array(
                    'message'       =>  'Password Updated Successfull !',
                    'alert-type'    =>  'success'
                );
            }
            return redirect()->route('login')->with($notification);
        }
        else{
            $notification = array(
                'message'       =>  'Old password does not match !',
                'alert-type'    =>  'error'
            );
            return redirect()->route('passwords')->with($notification);
        }
    }
}
