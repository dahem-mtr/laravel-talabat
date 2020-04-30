<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class testController extends Controller
{
    public function index()
    {
         /* Get credentials from .env */
         $token = getenv("TWILIO_AUTH_TOKEN");
         $twilio_sid = getenv("TWILIO_SID");
         $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
         $twilio = new Client($twilio_sid, $token);
         $twilio->verify->v2->services($twilio_verify_sid)
             ->verifications
             ->create('+966506499227', "sms");
         echo 'god';
    }
}
