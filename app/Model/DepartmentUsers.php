<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/7/19
 * Time: 9:21 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class DepartmentUsers extends Model
{
    protected $guarded =[];

    public $timestamps = false;


    public function user()
    {

        return $this->belongsTo(User::class,'user_id','id');

    }


}