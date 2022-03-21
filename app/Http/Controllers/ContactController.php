<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use DB;
use Mail;
use App\Mail\ContactMail;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function contact(){
        $contact=Contact::latest()->get();
        return view("contact.contact",["contacts"=>$contact]);
    }

    public function postContact(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:800',
        ]);
        if($validator->fails()){
            return $this->failureResponse(401,$validator->errors()->first());
        } 
        $mailData = [
            'title' => 'Enquiry from Website',
            'body' => $request->message
        ];
        $clientIP = request()->ip(); 
        $checkForward=Contact::whereDate('created_at',Carbon::today())->where('IP',$clientIP)->count();;
        if($checkForward==0){
        DB::table('contacts')->insert([
            "name"=>$request->name,
            "email"=>$request->email,
            "description"=>$request->message,
            "IP"=>$clientIP,
            "created_at"=>Carbon::now()
        ]);
        try {
            Mail::to('seyiadejugbagbe@gmail.com')->send(new ContactMail($mailData));
         } catch (\Throwable $th) {
            //  throw $th;
         }
       return  $this->successResponse(200,"Message sent successfully");
    }
    else{
        return $this->failureResponse(401,"Multiple message is not allowed on server");
    }
    }
}
