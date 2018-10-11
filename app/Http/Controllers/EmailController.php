<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Participant;
use App\Coupon;

class EmailController extends Controller
{

    public function show(){
        return Participant::all();
    }

    public function send(Request $request)
    {
        // return $request;
      // Logic will go here
        $id = $request->id;
        $email = $request->email;
        
        $p = new Participant();
        $p->firstname = $request->firstname;
        $p->lastname = $request->lastname;
        $p->email = $email;
        $p->ref = $id;
        $p->amount = $request->amount;
        $p->photo = $request->photo;
        $p->username = $request->username;
        $p->save();

        if (!empty($request->coupon)) {
            $c = Coupon::find($request->coupon);
            $c->participant_id = $p->id;
            $type = $c->type;
            $p->plan = $type;
            $c->save();
            $p->save();

        }else{
            $type = $request->type;
            $p->plan = $type;
            $p->save();
        }

 
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

    public function coupon(Request $request)
    {
       $coupon = Coupon::where('coupon',$request->code)->where('participant_id', null)->first();
       if($coupon){
         return $coupon->id;
       }
        return response(null,500);
    }

    public function showCoupon($type = null){
        
        switch ($type) {
            case 'regular':
                $coupons = Coupon::where('participant_id', null)->where('type','Regular Coupon')->paginate(100);
                break;

            case 'student':
                $coupons = Coupon::where('participant_id', null)->where('type','Student Coupon')->paginate(100);
                break;
            case null:
                $coupons = Coupon::where('participant_id', null)->paginate(100);
                break;
            default:
                abort(404);
                break;
        }

        return view('coupon',[
            'coupons' => $coupons
        ]);

    }

    public function participants(){
        $participants = Participant::paginate(100);
        return view('participants', [
            'participants' => $participants
        ]);
    }
}
