<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{

    protected $guarded = [];


    public function userable()
    {
        return $this->morphMany(TicketDiscussion::class,'userable');

    }


    public function getPhoneNumberAttribute($value)
    {
        return $this->attributes['phone_number'] = str_replace("+","", $value);

    }

    public function setPhoneNumberAttribute($value)
    {
        return $this->attributes['phone_number'] = str_replace("+","", $value);

    }

    public function addDiscussion(TicketDiscussion $discussion)
    {
        return $this->userable()->save($discussion);


    }


    public function generateConfirmationCode()
    {
        $code =  rand(1000, 9999);


        if ($code != self::where('confirmation_code', $code)->first()->confirmation_code ){
            return $code;
        }
        return $this->generateConfirmationCode();


    }

}
