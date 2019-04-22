<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 4/16/19
 * Time: 7:19 PM
 */

namespace App\Utilies;


use Mailgun\Mailgun;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendEmail
{

    public static function buil()
    {
        return new self();

    }
    public function send($to , $body, $subject)
    {

        try{




            # First, instantiate the SDK with your API credentials
            $mg = Mailgun::create(MAILGUN_SECRET);

            $mg->messages()->send(MAILGUN_DOMAIN, [
                'from'    => BUSINESS_NAME .'<'.BUSINESS_EMAIL.'>',
                'to'      => 'Philip <'.$to.'>',
                'subject' => $subject,
                'text'    =>  $body
            ]);



        }catch (\Exception $exception){


            dd($exception->getMessage());

            return true;

        }

    }
}
