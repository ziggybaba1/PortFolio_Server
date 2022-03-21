<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use DB;
use App\Models\Media;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Services\ProjectService;
use App\Http\Mappers\ProjectMapper;

class ProjectController extends Controller
{
    public function __construct(ProjectService $project_service,ProjectMapper $project_mapper){
        $this->project_service=$project_service;
        $this->project_mapper=$project_mapper;
    }
    
    public function addproject(StoreProjectRequest $request){
            $imageData=[];
            if($request->hasFile('image')){
                $media = new Media;
               $imageData=$this->project_service->handleUploadImages($request->file('image'),$media);
            }
            $data=$this->project_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"media"=>json_encode($imageData)]);
            DB::table('projects')->insert($data);
            session()->flash('success', 'Successfully added');
            return redirect('/project/add');
    }

    public function updateproject(StoreProjectRequest $request,$id){
        //Send failed response if request is not valid
            $imageData=[];
            if($request->hasFile('image')){
                $media = new Media;
                $imageData=$this->project_service->handleUploadImages($request->file('image'),$media);
             }
            $med=DB::table('projects')->find($id);
            $data=$this->project_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"media"=>json_encode($this->project_service->mergeImage($med->media,$imageData))]);
            DB::table('projects')->where('id', $id)->update($data);
                session()->flash('success', 'Successfully added');
                return redirect('/project/edit/'.$id);
           
    }

    public function editproject($id){
        $project=Project::findOrFail($id);
        return view('projects.add',["project"=>$project]);
    }

    public function deleteproject($id){
        $project=Project::findOrFail($id);
        $project->delete(); 
        session()->flash('success', 'Successfully deleted');
        return redirect('/projects');
    }
}
