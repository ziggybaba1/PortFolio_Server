<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Media;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Services\TestimonyService;
use App\Http\Mappers\TestimonyMapper;

class TestimonyController extends Controller
{

    public function __construct(TestimonyService $testimony_service,TestimonyMapper $testimony_mapper){
        $this->testimony_service=$testimony_service;
        $this->testimony_mapper=$testimony_mapper;
    }

   public function testimony(){
       $testimony=Testimony::get();
       return view("testimonial.list",["testimonies"=>$testimony]);
   }

   public function add(){
    return view("testimonial.add");
   }

   public function addtestimony(StoreTestimonyRequest $request){
        $image_path=null;
        if($request->hasFile('image')){
            $media = new Media;
            $image_path=$this->testimony_service->handleUploadImages($request,$media);
        }
        $data=$this->testimony_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"media"=>$image_path->id]);
        DB::table('testimonies')->insert($data);
        session()->flash('success', 'Successfully added');
        return redirect('/testimonies/add');
   }

   public function edittestimony($id){
    $testimony=Testimony::findOrFail($id);
    return view("testimonial.add",['testimony'=>$testimony]);

   }

   public function updatetestimony(StoreTestimonyRequest $request,$id){
        $image_path=null;$media;
        if($request->hasFile('image')){
            $media = new Media;
            $image_path=$this->testimony_service->handleUploadImages($request->file('image'),$media);
        }
        $med=Testimony::findOrFail($id);
        $data=$this->testimony_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"media"=>$image_path->id??$med->media]);
        DB::table('testimonies')->where('id',$id)->update($data);
        session()->flash('success', 'Successfully added');
        return redirect('/testimonies/edit/'.$id);
   }

   public function deletetestimony($id){
    $testimony=Testimony::findOrFail($id);
    $testimony->delete(); 
    session()->flash('success', 'Successfully deleted');
    return redirect('/testimonies');
   }
}
