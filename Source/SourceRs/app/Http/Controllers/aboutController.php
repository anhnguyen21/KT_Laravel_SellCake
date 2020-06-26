<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\ContactFormRequest;


class aboutController extends Controller
{
    //
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';

        Mail::to("anhanh5811@gmail.com")->send(new DemoEmail($objDemo));
    }
}
