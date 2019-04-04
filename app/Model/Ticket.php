<?php


namespace App\Model;


use App\Utilies\TicketObserver;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];



    public function client()
    {
        return $this->belongsTo(Client::class ,'client_id','id');

    }

    public function department()
    {
        return $this->belongsTo(Department::class ,'department_id','id');

    }
    public function priority()
    {
        return $this->belongsTo(Priority::class ,'priority_id','id');

    }
    public function discussions()
    {
        return $this->hasMany(TicketDiscussion::class ,'ticket_id','id');

    }


}