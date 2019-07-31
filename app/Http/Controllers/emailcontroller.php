<?php

namespace App\Http\Controllers;

use App\Jobs\mydemojob;
use App\Mail\demoemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Support\Facades\Mail;
//use App\Mail\demoemail;
class emailcontroller extends Controller
{
    public function sendemail()
    {
       $userdata =array('name'=>'sam','address'=>'test@ext.com');
       // Mail::to('shomgan@gmail.com')->send(new demoemail($userdata));
        /*Mail::send([],[], function ($message) {
            $message->to('test@example.com');
            $message->setBody("<p>hello</p>",'text/html');
            $message->subject("teporary test email");
            $message->from('dummy@dummy.com');
         });*/
       mydemojob::dispatch($userdata)->delay(now()->addSecond(5));
      // Mail::to('shomgan@gmail.com')->send(new demoemail($userdata));
    }
}