<?php
/**
 * Created by IntelliJ IDEA.
 * User: philip
 * Date: 4/16/19
 * Time: 7:18 PM
 */

namespace App\Utilies;


use App\Model\User;

class UserObserver
{

    public function created(User $user)
    {
       try{
           $code = rand(2, 400);

           $user->confirmation_code = $code;

           $user->save();

           $body = 'Use this code to confirm your account '. $code;


           $subject = 'Confirm your account';

           SendEmail::buil()
               ->send($user->email, $body , $subject);

           $message = '';
           SendSms::build()
               ->verify($user->tell);
       }catch (\Exception $exception)
       {
          return true;

       }

    }
}
