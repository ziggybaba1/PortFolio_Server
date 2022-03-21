<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class BlogController extends Controller
{
   //
   public function addblog(Request $request){
    //valid credential
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'subtitle' => 'required',
        'meta' => 'required',
        'description' => 'required'
    ]);

    //Send failed response if request is not valid
        if($validator->fails()){
            return redirect('/blog/add')->withErrors(["error"=>$validator->errors()->first()]);
        } 
        $image_path="";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
            $image_path = "/images/" . $image_name;
        }
       
        DB::table('blogs')->insert([
            "title"=>$request->title,
            "subtitle"=>$request->subtitle,
            "meta"=>$request->meta,
            "description"=>$request->description,
            "posted_by"=>\Auth::user()->id,
            "thumbnail"=>$image_path,
            "fullimage"=>$image_path,
        ]);
        session()->flash('success', 'Successfully added');
        return redirect('/blog/add');
}

public function updateblog(Request $request,$id){
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'subtitle' => 'required',
        'meta' => 'required',
        'description' => 'required'
    ]);

    //Send failed response if request is not valid
        if($validator->fails()){
            return redirect('/blog/edit/'.$id)->withErrors(["error"=>$validator->errors()->first()]);
        } 
        $image_path=null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);
            $image_path = "/images/" . $image_name;
        }
        if($request->hasFile('image')){
        DB::table('blogs')->where('id', $id)->update([
            "title"=>$request->title,
            "subtitle"=>$request->subtitle,
            "meta"=>$request->meta,
            "description"=>$request->description,
            "posted_by"=>\Auth::user()->id,
            "thumbnail"=>$image_path,
            "fullimage"=>$image_path,
        ]);
    }
    else{
        DB::table('blogs')->where('id', $id)->update([
            "title"=>$request->title,
            "subtitle"=>$request->subtitle,
            "meta"=>$request->meta,
            "description"=>$request->description,
            "posted_by"=>\Auth::user()->id,
        ]);
    }
        session()->flash('success', 'Successfully updated');
        return redirect('/blog/edit/'.$id);
}

public function deleteblog($id){
    $blog=\App\Models\Blog::findOrFail($id);
    $blog->delete(); 
    session()->flash('success', 'Successfully deleted');
    return redirect('/blogs');
}

public function editblog($id){
    $blog=\App\Models\Blog::findOrFail($id);
    return view('blog.add',["blog"=>$blog]);
}
}
