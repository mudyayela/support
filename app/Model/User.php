<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/4/19
 * Time: 3:17 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class User extends Model
{
    protected $guarded = [];

    protected $table = 'users';


    public function userable()
    {
        return $this->morphMany(TicketDiscussion::class,'userable');

    }

    public function addDiscussion(TicketDiscussion $discussion)
    {
        return $this->userable()->save($discussion);

    }

    public function scopeAgent($query)
    {
        return $query->where('type', 'type');
    }


    public function getNameAttribute($value)
    {

        return $this->attributes['name'] = ucwords(strtolower($value));

    }

    public function generateConfirmationCode()
    {
        $code =  Str::random('5');
        if ($code = $this->confirmation_code ){

            return $this->generateConfirmationCode();
        }
        return $code;


    }

}
