<?php
/**
 * Created by PhpStorm.
 * User: philip
 * Date: 3/9/19
 * Time: 2:57 PM
 */

namespace App\Utilies;


use Illuminate\Database\Capsule\Manager as Capsule;
class DB
{
    public function __construct()
    {
        new Capsule();
    }

    public static  function beginTransaction()
    {

        return Capsule::connection()->beginTransaction();
    }
    public static  function commit()
    {

        return Capsule::connection()->commit();
    }
    public static  function rollBack()
    {

        return Capsule::connection()->rollBack();
    }

}