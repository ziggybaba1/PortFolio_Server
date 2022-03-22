<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Services\MediaService;

class MediaController extends Controller
{
    public function __construct(MediaService $media_service){
        $this->media_service=$media_service;
    }

    public function view(){
        $media=Media::latest()->get();

        return view("Media.list",['medias'=>$media]);
    }

    public function add(){
      
        return view("Media.add");
    }

    public function create(StoreMediaRequest $request){
        $imageData=[];
        if($request->hasFile('image')){
            $media = new Media;
           $imageData= $this->media_service->handleUploadImages($request,$media);
        }
        session()->flash('success', 'Successfully added');
        return redirect('/media/add');
}
}
