<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Participant;

class EmailController extends Controller
{

    public function show(){
        return Participant::paginate();
    }
    public function send(Request $request)
    {
        // return $request;
      // Logic will go here
        $id = $request->id;
        $type = $request->type;
        $email = $request->email;

        $p = new Participant();
        $p->firstname = $request->firstname;
        $p->lastname = $request->lastname;
        $p->email = $email;
        $p->plan = $type;
        $p->ref = $id;
        $p->amount = $request->amount;
        $p->photo = $request->photo;
        $p->username = $request->username;
        $p->save();
        
        Mail::send('emails.send', [ 
                                   'type' => $type, 
                                   'id' => $id, 
                                   'amount' => $request->amount, 
                                   'firstname' => $request->firstname, 
                                   'lastname' => $request->lastname
                ], function ($message) use($email) {

            $message->from('noreply@devfest.tech', 'DevFest South South Team');

            $message->to($email)->subject('Your DevFestSS 2018 ticket is confirmed');

        });


        return response()->json(['status' => 'success']);
            
    }
}
