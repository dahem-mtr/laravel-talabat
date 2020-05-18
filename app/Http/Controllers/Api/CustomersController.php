<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Twilio\Rest\Client;
use App\Customer;

class CustomersController extends Controller
{

    public function Send_verification_code(Request $request)
    {
        $phone_no = $request->get('phone_no');
        // send verify code sms
         /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $res = $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($phone_no, "sms");

        return response()->json(['status' => $res->status]);

    }



    public function verify(Request $request)
    {
        $phone_no = $request->get('phone_no');
        $code = $request->get('code');
       

         /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        // verify
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($code, array('to' => $phone_no));
        if ($verification->valid) {

            $token = Str::random(60);
            $customer = Customer::updateOrCreate([
                'phone_no' => $phone_no
            ], [
                'api_token' => $token,
            ]);
            
            return response()->json(['status' => $verification->valid,'customer' => $customer]);

        } else {
           
            return response()->json(['status' => false]);

        }

    }

}
