<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/7/19
 * Time: 8:24 PM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $with = ['departmentUsers'];

    protected $guarded = [];


    public function departmentUsers()
    {
        return $this->belongsToMany(User::class,'department_users');

    }

    public function addUser(User $user)
    {

        $this->departmentUsers()->attach($user->id);



    }

    public function removeUser(User $user)
    {
        return $this->departmentUsers()->detach($user->id);

    }

}