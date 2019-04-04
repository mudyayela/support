<?php

try{

    require_once 'init.php';

    require_once 'routes.php';


}catch (Exception $exception){



    error_log($exception->getMessage()."\ton [".date('Y-j-d H:i:s')."]\r\n", 3, "error.log");


   return view('error.php?error='.$exception->getMessage());

}
    
?>
