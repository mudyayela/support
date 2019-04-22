<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 4/17/19
 * Time: 9:44 AM
 */

namespace App\Utilies;


use App\Model\Client;

class ClientObserver
{
    public function created(Client $client)
    {


        try{
            $code = $client->generateConfirmationCode();
            $body = 'Use this link '. url('verify-email?_token='.password_hash($code , PASSWORD_BCRYPT));
            $subject = 'Confirm your account ';

            SendEmail::buil()
                ->send($client->email, $body , $subject);

            $response = SendSms::build()
                ->verify($client->tell);



            return true;

        }catch (\Exception $exception)
        {

          return true;
        }

    }

}
