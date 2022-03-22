<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Media;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Services\BlogService;
use App\Http\Mappers\BlogMapper;

class BlogController extends Controller
{
    public function __construct(BlogService $blog_service,BlogMapper $blog_mapper){
        $this->blog_service=$blog_service;
        $this->blog_mapper=$blog_mapper;
    }
   
   public function addblog(StoreBlogRequest $request){
        $image_path=null;
        if($request->hasFile('image')){
            $media = new Media;
            $image_path=$this->blog_service->handleUploadImages($request,$media);
        }
        $data=$this->blog_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"timestamp"=>$this->now()->format('Y-m-d H:i:s'),"media"=>$image_path->id]);
        DB::table('blogs')->insert($data);
        session()->flash('success', 'Successfully added');
        return redirect('/blog/add');
}

public function updateblog(StoreBlogRequest $request,$id){
    $image_path=null;$media;
    if($request->hasFile('image')){
        $media = new Media;
        $image_path=$this->blog_service->handleUploadImages($request->file('image'),$media);
    }
    $med=Testimony::findOrFail($id);
    $data=$this->blog_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"timestamp"=>$this->now()->format('Y-m-d H:i:s'),"media"=>$image_path->id??$med->media]);
        DB::table('blogs')->where('id', $id)->update($data);
        session()->flash('success', 'Successfully updated');
        return redirect('/blog/edit/'.$id);
}

public function deleteblog($id){
    $blog=Blog::findOrFail($id);
    $blog->delete(); 
    session()->flash('success', 'Successfully deleted');
    return redirect('/blogs');
}

public function editblog($id){
    $blog=Blog::findOrFail($id);
    return view('blog.add',["blog"=>$blog]);
}
}
