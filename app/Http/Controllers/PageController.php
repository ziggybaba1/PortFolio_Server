<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page as About;
use Illuminate\Support\Facades\Validator;
use DB;

class PageController extends Controller
{
    //
    public function home(){
        $home=About::where('type', 'home')->first();
        return view("Pages.home",["plan"=>$home]);
    }

    public function about(){
        $about=About::where('type', 'about')->first();
        return view("Pages.about",["plan"=>$about]);
    }

    public function contact(){
        $about=About::where('type', 'contact')->first();
        return view("Pages.contact",["plan"=>$about]);
    }

    public function setting(){
        $about=About::where('type', 'settings')->first();
        return view("Pages.setting",["plan"=>$about]);
    }



    public function update(Request $request){
        $image_path="";
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
        
            $image_path = "/images/" . $image_name;
        }
        
        DB::table('abouts')->where('type', 'home')->update([
            "introtitle"=>$request->introtitle,
            "introdescription"=>$request->introdescription,
            "advertview"=>$request->advertview,
            "likes"=>$request->likes,
            "comments"=>$request->comments,
            "follower"=>$request->follower,
            "image"=>$image_path
        ]);
        session()->flash('success', 'Successfully updated');
        return redirect()->back();
    }

    public function updateabout(Request $request){
        $image_path="";
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
            $image_path = "/images/" . $image_name;
        }
        DB::table('abouts')->where('type', 'about')->update([
            "url"=>$request->url,
            "introdescription"=>$request->introdescription,
            "image"=>$image_path
        ]);
        session()->flash('success', 'Successfully updated');
        return redirect()->back();
    }

    public function updatecontact(Request $request){
        $image_path="";
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
            $image_path = "/images/" . $image_name;
        }
        DB::table('abouts')->where('type', 'contact')->update([
            "introtitle"=>$request->introtitle,
            "introdescription"=>$request->introdescription,
            "image"=>$image_path
        ]);
        session()->flash('success', 'Successfully updated');
        return redirect()->back();
    }

    public function updatesetting(Request $request){
        $image_path="";
        if($request->hasFile('file')){
            $image = $request->file('file');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
            $image_path = "/images/" . $image_name;
        }
        DB::table('abouts')->where('type', 'settings')->update([
            "introtitle"=>$request->introtitle,
            "url"=>$request->url,
            "image"=>$image_path
        ]);
        session()->flash('success', 'Successfully updated');
        return redirect()->back();
    }
}
