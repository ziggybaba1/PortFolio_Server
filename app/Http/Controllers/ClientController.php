<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Media;
use App\Http\Requests\StoreClientRequest;
use App\Http\Services\ClientService;
use App\Http\Mappers\ClientMapper;

class ClientController extends Controller
{
    public function __construct(ClientService $client_service,ClientMapper $client_mapper){
        $this->client_service=$client_service;
        $this->client_mapper=$client_mapper;
    }

    public function client(){
        $client=Client::get();
        return view("clients.list",["client"=>$client]);
    }

    public function add(){
        return view("clients.add");
    }

    public function editclient($id){
        $client=Client::findOrFail($id);
        return view("clients.add",["client"=>$client]);
    }

    public function deleteclient($id){
        $client=Client::findOrFail($id);
        $client->delete(); 
        session()->flash('success', 'Successfully deleted');
        return redirect('/clients');
       }

    public function addclient(StoreClientRequest $request){
        $image_path=null;
        if($request->hasFile('image')){
            $media = new Media;
            $image_path=$this->client_service->handleUploadImages($request,$media);
        }
        $data=$this->testimony_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"media"=>$image_path->id]);
            DB::table('clients')->insert($data);
            session()->flash('success', 'Successfully added');
            return redirect('/clients/add');
    }

    public function updateclient(Request $request,$id){
        $image_path=null;$media;
        if($request->hasFile('image')){
            $media = new Media;
            $image_path=$this->testimony_service->handleUploadImages($request->file('image'),$media);
        }
        $med=Client::findOrFail($id);
        $data=$this->testimony_mapper->matchRequest($request,["uuid"=>$this->now()->timestamp,"media"=>$image_path->id??$med->media]);
            DB::table('clients')->insert($data);
            session()->flash('success', 'Successfully added');
            return redirect('/clients/edit/'.$id);
    }

    
}
