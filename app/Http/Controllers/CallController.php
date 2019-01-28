<?php

namespace App\Http\Controllers;

use Twilio\Jwt\ClientToken;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function incoming()
    {
        $clientToken = new ClientToken(config('services.twilio.key'), config('services.twilio.secret'));
        $clientToken->allowClientIncoming("joey");
        $token = $clientToken->generateToken();

        return $token;
    }
}
