<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'Rotech';
        $objDemo->receiver = 'Nguyễn Văn A';
 
        // Mail::to("dainv0402@gmail.com")->send(new DemoEmail($objDemo));
        Mail::to('dainv0402@gmail.com')
        ->cc(['dainv@blueseed.tv','testofdai@gmail.com'])
        ->queue(new DemoEmail($objDemo));

        if( count(Mail::failures()) > 0 ) {
            echo "There was one or more failures. They were: <br />";
        } else {
            echo "No errors, all sent successfully!";
        }
    }
}