<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Product extends  Model
{

    protected $guarded = [];


    public function setPriceAttribute($value)
    {

        $value = str_replace(',','',$value);


        return $this->attributes['price'] = (double)floatval($value);
    }



}