<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 4/16/19
 * Time: 1:09 PM
 */

namespace App\Utilies;


use Nexmo\Client;

class SendSms
{

    private $client;


    public function __construct()
    {
        $this->client = new Client(new Client\Credentials\Basic('47600d77', 'Gy5iuy4ymjTcSr8u'));

    }

    public static function build()
    {
        return new self();

    }

    public function send($to , $message)
    {

        $this->client->message()->send(['to' => (int)$to , 'text' => $message ,"from" => "nexmo"])->getResponseData();

        
    }

    public function verify($to)
    {

        try{
            $verification = $this->client->verify()->start([
                'number' => (int)str_replace("+","", $to),
                'brand'  => "Nexmo",
                'code_length'  => '4'
            ]);

            $_SESSION['request_id'] = $verification->getRequestId();

            return $verification->getRequestId();
        }catch (\Exception $exception)
        {

        }

    }

    public function verifyRequest()
    {


        $verification = new \Nexmo\Verify\Verification($_SESSION['request_id']);

        $result = $this->client->verify()->check($verification, $_POST['code']);
        

        if ($result->getResponse()->getReasonPhrase() == 'OK'){
            return true;
        }
        return false;

    }
}
