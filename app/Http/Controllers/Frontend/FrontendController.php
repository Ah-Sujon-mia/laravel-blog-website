<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Post;
use App\Setting;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    // home pages
    public function index(){
        $Setting = Setting::where('id', 1)->first();
        $Post = Post::with('Category','User')->orderby('id', 'DESC')->paginate(12);
        $Posts = Post::with('Category','User')->orderby('id', 'DESC')->get();
        $FastPost = $Posts->splice(0,2);
        $MiddlePost = $Posts->splice(5,1);
        $LastPost = $Posts->splice(6,2);

        $Posted = Post::with('Category','User')->inRandomOrder()->limit(4)->get();
        $FastPosts = $Posted->splice(0,1);
        $MiddlePosts = $Posted->splice(0,1);
        $LastPosts = $Posted->splice(0,2);

        return view('website.index',compact('Post','FastPost','MiddlePost','LastPost','FastPosts','MiddlePosts','LastPosts','Setting'));
    }

    // about pages
    public function about(){
        $Setting = Setting::where('id', 1)->first();
        return view('website.about', compact('Setting'));
    }

    // contact pages
    public function contact(){
        $Setting = Setting::where('id', 1)->first();
        return view('website.contact', compact('Setting'));
    }

    // category pages
    public function category(){
        $Setting = Setting::where('id', 1)->first();
        return view('website.category', compact('Setting'));
    }

    // single post pages
    public function post($slug){
        $Setting = Setting::where('id', 1)->first();
        $SinglePost = Post::with('Category','User')->where('slug', $slug)->first();
        if($SinglePost){
            $Category = Category::all();
            $Post = Post::with('Category','User')->inRandomOrder()->limit(4)->get();
            $ReletedPost = Post::with('Category','User')->inRandomOrder()->limit(3)->get();
            $Tag = Tags::all();
            return view('website.post', compact('SinglePost','Category','Post','Tag','ReletedPost','Setting'));
        }
        else{
            return redirect('/');
        }
    }

    // category wise post
    public function categoryPost($id){
        $Setting = Setting::where('id', 1)->first();
        $CategoryPost = Post::where('category_id', $id)->paginate(6);
        return view('website.category', compact('CategoryPost','Setting'));
    }

    // contact store
    public function contatStore(Request $request){
        $request->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required|email',
            'subject'       =>  'required|max:100',
            'message'       =>  'required|max:200'
        ]);

        $Contact = Contact::create([
            'fname' =>  $request->first_name,
            'lname' =>  $request->last_name,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'subject' =>  $request->subject,
            'message' =>  $request->message
        ]);

        Mail::send('website.mail.contact', [
            'name'  =>  $request->first_name, 
            'lname' =>  $request->last_name,
            'email' =>  $request->email,
        ],function($mail)use($request){
            $mail->from('sujonbdjoin019@gmail.com','Laravel Blog Website');
            $mail->to($request->email)->subject($request->subject);
        });

        if($Contact){
            return redirect()->back()->with('message', 'Your message send successfull !');
        }

    }

}
