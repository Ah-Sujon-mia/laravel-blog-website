<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting(){
        $Setting = Setting::where('id', 1)->first();
        return view('admin.setting.index', compact('Setting'));
    }

    public function store(Request $request, $id){

        $img = $request->file('logo');
        if(isset($img)){
            unlink(public_path('website/images/logo/').$request->old_img);
            
            $logoName = time(). '.' .$img->getClientOriginalExtension();
            $img->move(public_path('website/images/logo/'),$logoName);
        }
        else{
            $logoName = $request->old_img;
        }
        

        $Store = Setting::where('id',$id)->update([
            'logo'          =>  $logoName,
            'phone'         =>  $request->mobile,
            'description'   =>  $request->shologan,
            'location'      =>  $request->address,
            'facebook'      =>  $request->facebook,
            'twitter'       =>  $request->twitter,
            'linkedin'      =>  $request->linkedin,
            'email'         =>  $request->email,
            'copyright'     =>  $request->copyright
       ]);

       if($Store){
           $notification = array(
            'message'    =>  'your data has been successfull:)',
            'alert-type' =>  'success'
           );
           return redirect()->back()->with($notification);
       }
       else{
            $notification = array(
            'message'    =>  'your data does not successfull:)',
            'alert-type' =>  'error'
           );
           return redirect()->back()->with($notification);
       }
       
    }
}
