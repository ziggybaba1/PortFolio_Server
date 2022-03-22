<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Testimony;
use App\Models\Social;
use App\Models\Blog;
use App\Models\Project;
use DB;

class ApiController extends Controller
{
    //
    public function testimonies(){
        $testi=DB::table('testimonies') 
        ->select('testimonies.*','media.*')
        ->join('media', 'media.id', '=', 'testimonies.media')
        ->take(4)
        ->get();
        $returnStatus=[
            "status"=>"success",
            "data"=>$testi
        ];
        return response()->json($returnStatus,200);
    }

    public function projects(){
        $project=Project::take(10)->get();
        $returnStatus=[
            "status"=>"success",
            "data"=>$project
        ];
        return response()->json($returnStatus,200);
    }

    public function projectdetail($name){
        $project= Project::where('uuid',$name)->first();
        $returnStatus=[
            "status"=>"success",
            "data"=>$project,
        ];
        return response()->json($returnStatus,200); 
    }

    public function blogs($start=0){
        $blogs= DB::table('blogs') 
                ->select('users.id', 'users.name','blogs.*','media.id as mid','media.url')
                ->join('users', 'users.id', '=', 'blogs.posted_by')
                ->join('media', 'media.id', '=', 'blogs.fullimage')
                ->skip($start)
                ->take(6)
                ->get();
        $returnStatus=[
            "status"=>"success",
            "data"=>$blogs
        ];
        return response()->json($returnStatus,200);
    }

    public function blogdetail($name){
        $blogs= Blog::select('users.id', 'users.name','blogs.*','media.id as mid','media.url')
                ->where('blogs.uuid',$name)
                ->join('users', 'users.id', '=', 'blogs.posted_by')
                ->join('media', 'media.id', '=', 'blogs.fullimage')
                ->first();
        $blogsP= DB::table('blogs')
                ->select('users.id', 'users.name','blogs.*','media.id as mid','media.url')
                ->join('users', 'users.id', '=', 'blogs.posted_by')
                ->join('media', 'media.id', '=', 'blogs.fullimage')
                ->skip(0)
                ->take(6)
                ->get();
        $returnStatus=[
            "status"=>"success",
            "blog"=>$blogs,
            "other"=>$blogsP
        ];
        return response()->json($returnStatus,200);
    }
}
