<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\Validator;
use DB;

class SocialController extends Controller
{
    //
    public function instagram(){
        $social=Social::where('type','instagram')->first();
        return view("social.instagram",["title"=>"Instagram","data"=>$social]);
    }
    public function twitter(){
        $social=Social::where('type','twitter')->first();
        return view("social.instagram",["title"=>"Twitter","data"=>$social]);
    }
    public function facebook(){
        $social=Social::where('type','facebook')->first();
        return view("social.instagram",["title"=>"Facebook","data"=>$social]);
    }
    public function linkedn(){
        $social=Social::where('type','linkedn')->first();
        return view("social.instagram",["title"=>"Linkedn","data"=>$social]);
    }
    public function whatsapp(){
        $social=Social::where('type','whatsapp')->first();
        return view("social.instagram",["title"=>"Whatsapp","data"=>$social]);
    }
    public function update(Request $request,$name){
        $validator = Validator::make($request->all(), [
            'url' => 'required',
        ]);

        //Send failed response if request is not valid
            if($validator->fails()){
                return redirect()->back()->withErrors(["error"=>$validator->errors()->first()]);
            } 
            $name=strtolower($name);
            DB::table('socials')->where('type', $name)->update([
                "name"=>$name,
                "url"=>$request->url,
            ]);
            session()->flash('success', 'Successfully updated');
            return redirect()->back();
    }
}
