<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $guarded = [];


    public function userable()
    {
        return $this->morphMany(TicketDiscussion::class,'userable');

    }



    public function addDiscussion(TicketDiscussion $discussion)
    {
        return $this->userable()->save($discussion);

    }

}