<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Media;

class ClientController extends Controller
{

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
        $testimony=Client::findOrFail($id);
        $testimony->delete(); 
        session()->flash('success', 'Successfully deleted');
        return redirect('/clients');
       }

    public function addclient(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
        ]);
        //Send failed response if request is not valid
            if($validator->fails()){
                return redirect('/clients/add')->withErrors(["error"=>$validator->errors()->first()]);
            } 
            $image_path="";$media;
            if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path('/images'),$image_name);
                    $image_path = "/images/" . $image_name;
                    $media = new Media;
                    $media->filename=$image_name;
                    $media->url=$image_path;
                    $media->save();
            }
            DB::table('clients')->insert([
                "name"=>$request->name,
                "url"=>$request->url,
                "media"=>$media->id
            ]);
            session()->flash('success', 'Successfully added');
            return redirect('/clients/add');
    }

    public function updateclient(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        //Send failed response if request is not valid
            if($validator->fails()){
                return redirect('/clients/edit/'.$id)->withErrors(["error"=>$validator->errors()->first()]);
            } 
            $image_path="";$media;
            if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path('/images'),$image_name);
                    $image_path = "/images/" . $image_name;
                    $media = new Media;
                    $media->filename=$image_name;
                    $media->url=$image_path;
                    $media->save();
            }
            DB::table('clients')->insert([
                "name"=>$request->name,
                "url"=>$request->url,
                "media"=>$media->id??Client::findOrFail($id)->media
            ]);
            session()->flash('success', 'Successfully added');
            return redirect('/clients/edit/'.$id);
    }

    
}
