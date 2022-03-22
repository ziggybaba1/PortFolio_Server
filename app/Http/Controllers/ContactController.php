<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use DB;
use Mail;
use App\Mail\ContactMail;
use Carbon\Carbon;
use App\Http\Requests\StoreContactRequest;
use App\Http\Mappers\ContactMapper;

class ContactController extends Controller
{

    public function __construct(ContactMapper $contact_mapper){
        $this->contact_mapper=$contact_mapper;
    }
    public function contact(){
        $contact=Contact::latest()->get();
        return view("contact.contact",["contacts"=>$contact]);
    }

    public function postContact(StoreContactRequest $request){
        $mailData = [
            'title' => 'Enquiry from Website',
            'body' => $request->message
        ];
        $contactIP = request()->ip(); 
        $checkForward=Contact::whereDate('created_at',Carbon::today())->where('IP',$contactIP)->count();;
        if($checkForward==0){
        $data=$this->contact_mapper->matchRequest($request,["uuid"=>$this->now(),"ip"=>$contactIP]);
        DB::table('contacts')->insert($data);
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
