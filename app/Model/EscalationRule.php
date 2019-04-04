<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/9/19
 * Time: 12:52 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class EscalationRule extends Model
{

    protected $guarded = [];


    public function action()
    {
        return $this->hasOne(EscalationAction::class ,'escalation_rule_id','id');


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