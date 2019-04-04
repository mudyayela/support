<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/9/19
 * Time: 1:24 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class EscalationAction extends Model
{
    protected $guarded = [];


    public function rule()
    {
        return $this->belongsTo(EscalationRule::class ,'escalation_rule_id','id');

    }


    public function user()
    {
        return $this->belongsTo(User::class ,'user_id','id');

    }



    public function department()
    {
        return $this->belongsTo(Department::class ,'department_id','id');

    }
    public function priority()
    {
        return $this->belongsTo(Priority::class ,'priority_id','id');

    }


}