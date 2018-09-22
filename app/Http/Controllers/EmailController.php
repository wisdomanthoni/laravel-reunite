<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        // return $request;
      // Logic will go here
        $id = $request->id;
        $type = $request->type;
        $email = $request->email;
        
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
