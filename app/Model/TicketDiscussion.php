<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Builder;

class TicketDiscussion extends Model
{

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        parent::boot();

    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('created_at', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }


    public function userable()
    {
        return $this->morphTo();

    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id','id');

    }

}